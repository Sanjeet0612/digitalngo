<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\GalleryCategory;
use App\Models\Admin\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GalleryController extends Controller
{
    public function picture_category(Request $request){
        $allCategory = GalleryCategory::all(); 
        return view('admin.gallery.manage_picture_category',compact('allCategory'));
    }
    public function add_category(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'cat_name.*' => 'required|string|max:255',
                'gtype.*'    => 'required|in:photo,video',
                'status.*'   => 'required|in:0,1',
            ]);

            foreach($request->cat_name as $key => $catName){
                GalleryCategory::create([
                    'cat_name' => $catName,
                    'gtype'    => $request->gtype,
                    'status'   => $request->status[$key],
                ]);
            }
            return redirect('admin/picture-category')->with('success', 'Successfully Addd!');

        }else{
            return view('admin.gallery.add_category_form');
        }
    }
    public function edit_category(Request $request,$id){
        $catdata = GalleryCategory::where('id',$id)->first();
        return view('admin.gallery.edit_category_form',compact('catdata'));
    }
    public function update_category(Request $request,$id){
        $request->validate([
            'cat_name.*' => 'required|string|max:255',
            'gtype.*'    => 'required|in:photo,video',
            'status.*'   => 'required|in:0,1',
        ]);
        $category = GalleryCategory::findOrFail($id);

        foreach($request->cat_name as $key => $catName){
            $category->cat_name = $catName;
            $category->gtype    = $request->gtype;
            $category->status   = $request->status[$key];
            $category->save();
        }

        return redirect('admin/picture-category')->with('success', 'Category updated successfully');
    }
    public function delete_category($id){
        $category = GalleryCategory::find($id);
        if(!$category){
            return redirect()->back()->with('error', 'Category not found');
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
    // Picture Section 
    public function gallery_picture(Request $request){
        $galleryList = Gallery::where('gtype','photo')->with('category')->orderBy('id', 'desc')->paginate(12);
        //print_r($galleryList);
        return view('admin.gallery.manage_gallery_picture',compact('galleryList'));
    }
    public function add_picture(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'gtype'  => 'required|in:photo,video',
                'picture.*'=> 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi',
                'status' => 'required',
            ]);

            if($request->hasFile('picture')){

                foreach ($request->file('picture') as $file) {

                    $mime = $file->getMimeType();
                    // IMAGE
                    if(str_starts_with($mime, 'image')) {
                        $filename = time().'_'.uniqid().'.jpg';
                        $savePath = storage_path('app/public/admin/uploads/gallery/'.$filename);
                        if(!file_exists(dirname($savePath))) {
                            mkdir(dirname($savePath), 0755, true);
                        }
                        $srcPath = $file->getRealPath();
                        $info = getimagesize($srcPath);

                        switch ($info['mime']){
                            case 'image/jpeg':
                                $image = imagecreatefromjpeg($srcPath);
                                break;

                            case 'image/png':
                                $image = imagecreatefrompng($srcPath);
                                break;

                            case 'image/webp':
                                $image = imagecreatefromwebp($srcPath);
                                break;

                            default:
                                continue 2;
                        }

                        // Resize (max width 1920)
                        $width  = imagesx($image);
                        $height = imagesy($image);

                        if($width > 1920) {
                            $newWidth  = 1920;
                            $newHeight = intval(($height / $width) * $newWidth);

                            $tmp = imagecreatetruecolor($newWidth, $newHeight);
                            imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                            imagedestroy($image);
                            $image = $tmp;
                        }
                        // Compress till ~800KB
                        $quality = 85;
                        do{
                            imagejpeg($image, $savePath, $quality);
                            $quality -= 5;
                        } while (filesize($savePath) > 800 * 1024 && $quality > 40);
                        imagedestroy($image);
                        $path  = 'admin/uploads/gallery/'.$filename;
                        $gtype = 'photo';
                    }
                    // VIDEO
                    elseif(str_starts_with($mime, 'video')) {
                        $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                        $path = $file->storeAs('admin/uploads/gallery', $filename, 'public');
                        $gtype = 'video';
                    }
                    else{
                        continue;
                    }
                    Gallery::create([
                        'cat_id' => $request->cat_id,
                        'gtype'  => $gtype,
                        'path'   => $path,
                        'status' => $request->status ?? 1,
                    ]);
                }   
            }
            return redirect()->back()->with('success', 'Gallery uploaded successfully');
        }
        else{
            $allCat = GalleryCategory::all();
            return view('admin.gallery.gallery_picture_form',compact('allCat'));
            }
    }

    public function edit_gallery_picture($id){
        $allCat    = GalleryCategory::all();
        $galdetail = Gallery::where('id',base64_decode($id))->first();
        //print_r($galdetail); die();
        return view('admin.gallery.edit_gallery_form',compact('allCat','galdetail'));                                
    }

    public function update_picture(Request $request,$id){
        $gallery = Gallery::findOrFail($id);
        $path    = $gallery->path;
        $gtype   = $gallery->gtype;

        if($request->hasFile('picture')){
            // old file delete
            if($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $file = $request->file('picture');
            $mime = $file->getMimeType(); 
            
            // IMAGE
            if(str_starts_with($mime, 'image')){
                $manager  = new ImageManager(new Driver());
                $filename = time().'_'.uniqid().'.jpg';
                $savePath = storage_path('app/public/admin/uploads/gallery/'.$filename);
                $image    = $manager->read($file);
                $image->resize(1920, null);
                $quality = 85;
                do{
                    $image->save($savePath, quality: $quality);
                    $quality -= 5;
                } while (filesize($savePath) > 800 * 1024 && $quality > 40);
                $path  = 'admin/uploads/gallery/'.$filename;
                $gtype = 'photo';
            }
            elseif(str_starts_with($mime, 'video')){
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $path = $file->storeAs('admin/uploads/gallery', $filename, 'public');
                $gtype = 'video';
            }
        }
        // update record
        $gallery->update([
            'cat_id' => $request->cat_id,
            'gtype'  => $gtype,
            'path'   => $path,
            'status' => $request->status ?? 1,
        ]);
        return redirect()->back()->with('success', 'Gallery updated successfully');
    }
    // Video Section
    public function gallery_video(Request $request){
        $galleryList = Gallery::where('gtype','video')->with('category')->orderBy('id', 'desc')->paginate(12);
        return view('admin.gallery.manage_gallery_video',compact('galleryList'));
    }
    public function add_video(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'embedCode' => 'required',
                'status' => 'required',
            ]);
            
            Gallery::create([
                'cat_id' => 1,
                'gtype'  => 'video',
                'path'   => $request->embedCode,
                'status' => $request->status,
            ]);
           
            return redirect()->back()->with('success','Successfully Added!');

        }else{
            $galleryList = Gallery::with('category')->orderBy('id', 'desc')->paginate(12);
            return view('admin.gallery.add_video_form',compact('galleryList'));
        }                                    
    }

}
