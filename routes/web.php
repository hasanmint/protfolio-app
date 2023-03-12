<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\ProtfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/abouthello', function () {
    return "ello world";
})->name('elloworld');


// Home  Route
 
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'homeIndex')->name('home');
  
});



// Admin All Route
Route::middleware(['auth'])->group(function () {
    //

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');
    Route::get('/change/password', 'changePassword')->name('change.password');
    Route::post('/update/password', 'updatePassword')->name('update.password');
   
});

});



// Home Slider  Route

Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slider', 'homeSlider')->name('home.slider');
    Route::post('/update/slider', 'updateSlider')->name('update.slider');
});

// Home Slider  Route

Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'aboutPage')->name('about.page');
    Route::post('/update/about', 'updateAbout')->name('update.about');
    Route::get('/about', 'About')->name('about');
    Route::get('/about/multi/image', 'aboutMultiImage')->name('about.multi.image');
    Route::post('/about/store/multi/image', 'aboutStoreImage')->name('store.muti.image');
    Route::get('/all/multi/image', 'allMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'updateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'deleteMultiImage')->name('delete.multi.image');
    
});


// Protflio All Route

Route::controller(ProtfolioController::class)->group(function () {
    Route::get('/all/protfolio', 'allProtfolio')->name('all.protfolio');
    Route::get('/add/protfolio', 'addProtfolio')->name('add.protfolio');
    Route::post('/store/protfolio', 'storeProtfolio')->name('store.protfolio');
    Route::get('/edit/protfolio/{id}', 'editProtfolio')->name('edit.protfolio');
    Route::post('/update/protfolio', 'updateProtfolio')->name('update.protfolio');
    Route::get('/delete/protfolio/{id}', 'deleteProtfolio')->name('delete.protfolio');
    Route::get('/details/protfolio/{id}', 'detailsProtfolio')->name('portfolio.details');

    Route::get('/home/protfolio', 'homeProtfolio')->name('home.portfolio');

   

    
});


// Blog Category All Route

Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category', 'allBlogCategroy')->name('all.blog.categroy');
    Route::get('/add/blog/category', 'addBlogCategroy')->name('add.blog.categroy');
    Route::post('/store/blog/category', 'storeBlogCategroy')->name('store.blog.categroy');
    Route::get('/edit/blog/category/{id}', 'editBlogCategroy')->name('edit.blog.categroy');
    Route::post('/update/blog/category', 'updateBlogCategroy')->name('update.blog.categroy');
    Route::get('/delete/blog/category/{id}', 'deleteBlogCategroy')->name('delete.blog.categroy');
 
});

// Blog  All Route

Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'allBlog')->name('all.blog');
    Route::get('/add/blog', 'addBlog')->name('add.blog');
    Route::get('/edit/blog/{id}', 'editBlog')->name('edit.blog');
    Route::post('/store/blog', 'storeBlog')->name('store.blog');
    Route::post('/update/blog', 'updateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'deleteBlog')->name('delete.blog');

    Route::get('/details/blog/{id}', 'detailsBlog')->name('details.blog');
    Route::get('/blog/category/{id}', 'blogCategory')->name('blog.category');

    Route::get('/blog', 'homeBlog')->name('home.blog');
   
 
});



// Footer  All Route

Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setting', 'footerSetting')->name('footer.setting');
    Route::post('/update/footer', 'updateFooter')->name('update.footer');

});


// Contact  All Route

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/store/message', 'storeMessage')->name('store.message');
    Route::get('/all/contact', 'allContact')->name('all.contact');
    Route::get('/delete/contact/{id}', 'deleteContact')->name('delete.contact');
    
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
