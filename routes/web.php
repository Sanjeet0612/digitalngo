<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SettingController;

// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventGalleryController;
use App\Http\Controllers\Admin\TeamController;
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
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/donation', 'donation')->name('donation');

    
    

    
    
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
// Blog Section
Route::prefix('blog')->middleware('auth')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'blog')->name('blog');
        Route::match(['get', 'post'],'/add-blog', 'add_blog')->name('add_blog');
        Route::post('/{id}/comment','addComment')->name('comment');
    });
});

Route::get('/blog/{slug}', [BlogController::class, 'blog_detail'])->name('details');
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
        Route::get('/management-picture', [GalleryController::class, 'management_picture'])->name('admin.management_picture');
        
        
        
        
        
    });
});

