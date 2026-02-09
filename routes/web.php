<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FeaturesController;



// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventGalleryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\KeyFeatureController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\CausesController;
use Illuminate\Support\Facades\Route;



/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/management', 'management')->name('management');
    Route::get('/volunteers', 'volunteers')->name('volunteers');
    Route::get('/image', 'image')->name('image');
    Route::get('/video', 'video')->name('video');
    Route::get('/events', 'events')->name('events');
    Route::get('/event-details/{slug}', 'event_details')->name('event-details');
    Route::get('/articles', 'articles')->name('articles');
    Route::get('/articles/category/{category}', 'category')->name('articles.category');
    Route::get('/articles/tags/{tags}', 'tags')->name('articles.tags');
    Route::get('/articles/{slug}', 'artical_detail')->name('details');
    Route::match(['get', 'post'],'/contact','contact')->name('contact');
    Route::match(['get', 'post'],'/donation','donation')->name('donation');
    Route::get('/function-features', 'function_features')->name('function_features');
    
    
    
});

Route::get('/ask-ai', [HomeController::class, 'askAi']);

// Authentication
Route::prefix('authentication')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/forgotpassword', 'forgotPassword')->name('forgotPassword');
        Route::match(['get', 'post'],'/signin','signin')->name('login');
        Route::match(['get', 'post'],'/signup','signup')->name('signup');
       
    });
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard.index');
        Route::get('/logout', 'logout')->name('dashboard.logout');
        
    });
});

Route::prefix('users')->middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/my-profile', 'my_profile')->name('my_profile');
        Route::post('/update-profile', 'update_profile')->name('update_profile');
        Route::get('/pan/{filename}', 'getPan')->name('pan');
        Route::get('/adhar/{filename}', 'getAadhar')->name('adhar');
        Route::post('/update-password', 'update_password')->name('update_password');
        Route::get('/new-user', 'new_user')->name('new_user');
        Route::match(['get', 'post'],'/view-profile','view_profile')->name('view_profile');
        Route::get('/users','userList')->name('users.list');
    });
});
// Function & Features Section
Route::prefix('fearures')->middleware('auth')->group(function () {
    Route::controller(FeaturesController::class)->group(function () {
        Route::get('/', 'all_features')->name('all_fearure');
        Route::post('/feature-pdf', 'feature_pdf')->name('feature_pdf');
    });
});




Route::get('/category/{category}', [BlogController::class, 'category'])->name('blogs.category');
Route::get('/tag/{tag}', [BlogController::class, 'tag'])->name('blogs.tag');
Route::post('/comment/store', [BlogController::class, 'store'])->name('comment.store');

// Setting Section
Route::prefix('settings')->middleware('auth')->group(function () {
    Route::controller(SettingController::class)->group(function () {
        Route::match(['get', 'post'],'/', 'setting')->name('setting');
        Route::get('/signature/{filename}', 'getSignature')->name('signature');
    });
});



/*Route::get('/check-openai', function () {
    dd(env('OPENAI_API_KEY'));
});*/





// Admin Section 

//Route::get('/admin',[AdminController::class,'index'])->name('index');

Route::prefix('admin')->group(function () {
    // Login
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    // Logout
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Admin (protected)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/manage-banner', [AdminController::class, 'manage_banner'])->name('admin.manage_banner');
        Route::match(['get', 'post'], '/add-banner', [AdminController::class, 'add_banner'])->name('admin.add_banner');
        Route::get('/edit-banner/{id}', [AdminController::class, 'edit_banner'])->name('admin.edit_banner');
        Route::put('/update-banner/{id}', [AdminController::class, 'update_banner'])->name('admin.update_banner');
        // Contact Section
        Route::get('/manage-contact', [AdminController::class, 'manage_contact'])->name('admin.manage_contact');
        Route::match(['get', 'post'], '/add-contact', [AdminController::class, 'add_contact'])->name('admin.add_contact');
        // Sponsor Section
        Route::get('/manage-sponsor', [AdminController::class, 'manage_sponsor'])->name('admin.manage_sponsor');
        Route::match(['get', 'post'], '/add-sponsor', [AdminController::class, 'add_sponsor'])->name('admin.add-sponsor');
        Route::get('/edit-sponsor/{id}', [AdminController::class, 'edit_sponsor'])->name('admin.edit-sponsor');
        Route::put('/update-sponsor/{id}', [AdminController::class, 'update_sponsor'])->name('admin.update-sponsor');
        // Event Section
        Route::get('/manage-event', [AdminController::class, 'manage_event'])->name('admin.manage_event');
        Route::match(['get', 'post'], '/add-event', [AdminController::class, 'add_event'])->name('admin.add-event');
        Route::get('/edit-event/{id}', [AdminController::class, 'edit_event'])->name('admin.edit-event');
        Route::post('/update-event/{id}', [AdminController::class, 'update_event'])->name('admin.update-event');
        Route::get('/view-event/{id}', [AdminController::class, 'view_event'])->name('admin.view-event');
        // Event Gallery Section
        Route::get('/manage-event-gallery', [EventGalleryController::class, 'manage_event_gallery'])->name('admin.manage_event_gallery');
        Route::match(['get', 'post'], '/add-event-gallery', [EventGalleryController::class, 'add_event_gallery'])->name('admin.add-event-gallery');
        Route::get('/edit-event-gallery/{id}', [EventGalleryController::class, 'edit_event_gallery'])->name('admin.edit-event-gallery');
        Route::put('/update-event-gallery/{id}', [EventGalleryController::class, 'update_event_gallery'])->name('admin.update-event-gallery');
        // Team Section
        Route::get('/management-team', [TeamController::class, 'management_team'])->name('admin.management_team');
        Route::match(['get', 'post'], '/add-management-team', [TeamController::class, 'add_management_team'])->name('admin.add-management-team');
        Route::get('/edit-management/{id}', [TeamController::class, 'edit_management'])->name('admin.edit-management');
        Route::put('/update-management-team/{id}', [TeamController::class, 'update_management_team'])->name('admin.update-management-team');
        // Governing Board Teams
        Route::get('/governing_board_teams', [TeamController::class, 'governing_board_teams'])->name('admin.governing_board_teams');
        // volunteers Team
        Route::get('/volunteers-team', [TeamController::class, 'volunteers_team'])->name('admin.volunteers_team');
        // All Team
        Route::get('/all-team', [TeamController::class, 'all_team'])->name('admin.all_team');
        // Gallery Section
        Route::get('/picture-category', [GalleryController::class, 'picture_category'])->name('admin.picture_category');
        Route::match(['get', 'post'], '/add-category', [GalleryController::class, 'add_category'])->name('admin.add_category');
        Route::get('/edit-category/{id}', [GalleryController::class, 'edit_category'])->name('admin.edit_category');
        Route::put('/update-category/{id}', [GalleryController::class, 'update_category'])->name('admin.update_category');
        Route::delete('/delete-category/{id}',[GalleryController::class, 'delete_category'])->name('admin.delete_category');
        // Gallery Picture Section
        Route::get('/gallery-picture', [GalleryController::class, 'gallery_picture'])->name('admin.gallery_picture');
        Route::match(['get', 'post'], '/add-picture', [GalleryController::class, 'add_picture'])->name('admin.add_picture');
        Route::get('/edit-gallery-picture/{id}', [GalleryController::class, 'edit_gallery_picture'])->name('admin.edit_gallery_picture');
        Route::put('/update-picture/{id}', [GalleryController::class, 'update_picture'])->name('admin.update_picture');
        // Gallery Video Section
        Route::get('/gallery-video', [GalleryController::class, 'gallery_video'])->name('admin.gallery_video');
        Route::match(['get', 'post'], '/add-video', [GalleryController::class, 'add_video'])->name('admin.add_video');
        // Articles / Blog
        Route::get('/manage-category', [ArticleController::class, 'manage_category'])->name('admin.manage_category');
        Route::match(['get', 'post'], '/add-article-category', [ArticleController::class, 'add_article_category'])->name('admin.add_article_category');
        Route::get('/edit-blog-category/{id}', [ArticleController::class, 'edit_blog_category'])->name('admin.edit_blog_category');
        Route::put('/update-article-category/{id}', [ArticleController::class, 'update_article_category'])->name('admin.update_article_category');
        Route::get('/manage-articles', [ArticleController::class, 'manage_articles'])->name('admin.manage_articles');
        Route::match(['get', 'post'], '/add-articles', [ArticleController::class, 'add_articles'])->name('admin.add_articles');
        Route::get('/edit-articles/{id}', [ArticleController::class, 'edit_articles'])->name('admin.edit_articles');
        Route::put('/update-articles/{id}', [ArticleController::class, 'update_articles'])->name('admin.update_articles');
        Route::get('/blog-details/{slug}', [ArticleController::class, 'blog_details'])->name('admin.blog_details');
        Route::get('/category/{category}', [ArticleController::class, 'category'])->name('admin.category');
        Route::get('/tags/{category}', [ArticleController::class, 'tags'])->name('admin.tag');
        Route::post('/{id}/comment', [ArticleController::class, 'addComment'])->name('admin.comment');
        // Key Feature
        Route::get('key-features', [KeyFeatureController::class, 'key_features'])->name('admin.key_features');
        Route::match(['get', 'post'], '/add-key-feature', [KeyFeatureController::class, 'add_key_feature'])->name('admin.add_key_feature');
        Route::get('/edit-key-feture/{id}', [KeyFeatureController::class, 'edit_key_feture'])->name('admin.edit_key_feture');
        Route::put('/update-key-feature/{id}', [KeyFeatureController::class, 'update_key_feature'])->name('admin.update_key_feature');
        // Our Partners
        Route::get('our-partners', [PartnerController::class, 'our_partners'])->name('admin.our_partners');
        Route::match(['get', 'post'], '/add-partners', [PartnerController::class, 'add_partners'])->name('admin.add_partners');
        Route::get('/edit-our-partner/{id}', [PartnerController::class, 'edit_our_partner'])->name('admin.edit_our_partner');
        Route::put('/update-partners/{id}', [PartnerController::class, 'update_partners'])->name('admin.update_partners');
        Route::get('/delete-partner/{id}', [PartnerController::class, 'delete_partner'])->name('admin.delete_partner');
        // Causes
        Route::get('causes-category', [CausesController::class, 'causes_category'])->name('admin.causes_category');
        Route::match(['get', 'post'], '/add-causes-category', [CausesController::class, 'add_causes_category'])->name('admin.add_causes_category');
        Route::get('/edit-causes-category/{id}', [CausesController::class, 'edit_causes_category'])->name('admin.edit_causes_category');
        Route::put('/update-causes-category/{id}', [CausesController::class, 'update_causes_category'])->name('admin.update_causes_category');
        Route::get('/delete-causes-category/{id}', [CausesController::class, 'delete_causes_category'])->name('admin.delete_causes_category');

        Route::get('manage-causes', [CausesController::class, 'manage_causes'])->name('admin.manage_causes');
        Route::match(['get', 'post'], '/add-cause', [CausesController::class, 'add_cause'])->name('admin.add_cause');
        Route::get('edit-causes/{id}', [CausesController::class, 'edit_causes'])->name('admin.edit_causes');

        

        
        
        

        

        
        
        

    });
});

