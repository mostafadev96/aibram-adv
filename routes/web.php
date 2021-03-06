<?php

use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\AdvertisementController;
use App\Http\Controllers\Website\ChatController;
use App\Http\Controllers\Website\ContactUsController;
use App\Http\Controllers\Website\DashboardController;
use App\Http\Controllers\Website\FrontendController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::middleware('guest:user')->group(function(){
    Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
    Route::post('/login',[AuthController::class,'login'])->name('loginPost');
    Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
    Route::post('/register',[AuthController::class,'register'])->name('registerPost');
    Route::get('/forget-password',[AuthController::class,'showForgetPasswordForm'])->name('forgetPassword');
    Route::post('/forget-password',[AuthController::class,'forgetPassword'])->name('forgetPasswordPost');
    Route::get('/',[FrontendController::class,'home'])->name('home');
    Route::get('/categories',[FrontendController::class,'categories'])->name('categories');
    Route::get('/contact',[ContactUsController::class,'contactForm'])->name('contact');
    Route::post('/contact',[ContactUsController::class,'contact'])->name('contactPost');
    Route::get('/about',[FrontendController::class,'about'])->name('about');
    Route::get('/ads',[AdvertisementController::class,'all'])->name('ads');
    Route::get('/ads/{slug}',[AdvertisementController::class,'one'])->name('ad.details');
    Route::get('/profile/{id}',[FrontendController::class,'profile'])->name('profile');
});
Route::middleware('sensitve.auth')->group(function(){
    Route::get('/check-code',[AuthController::class,'checkCodeForm'])->name('checkCode');
    Route::post('/check-code',[AuthController::class,'checkCode'])->name('checkCodePost');
    Route::get('/change-password',[AuthController::class,'reInitPasswordForm'])->name('reInitPassword');
    Route::post('/change-password',[AuthController::class,'reInitPassword'])->name('reInitPasswordPost');
});

Route::middleware('auth:user')->group(function(){
    Route::middleware('suspended.user')->group(function(){
        Route::name('ad.')->prefix('/ad')->group(function(){
            Route::get('/create',[AdvertisementController::class,'create'])->name('create');
            Route::post('/',[AdvertisementController::class,'insert'])->name('insert');
            Route::get('/update/{id}',[AdvertisementController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[AdvertisementController::class,'update'])->name('update');
            Route::get('/delete/{id}',[AdvertisementController::class,'delete'])->name('delete');
            Route::post('/delete/{id}',[AdvertisementController::class,'destroy'])->name('destroy');
            Route::get('/chat/{id}',[AdvertisementController::class,'chat'])->name('chat');
            Route::get('/add_to_fav/{id}',[AdvertisementController::class,'add_to_fav'])->name('add_to_fav');
            Route::get('/remove_from_fav/{id}',[AdvertisementController::class,'remove_from_favorites'])->name('remove_from_favorites');
            
            Route::get('/add_comment/{id}',[AdvertisementController::class,'add_comment'])->name('add_comment');
        });
        Route::name('dashboard.')->prefix('/dashboard')->group(function(){
            Route::get('/',[DashboardController::class,'all'])->name('all');
            Route::get('/chats',[DashboardController::class,'chats'])->name('chats');
            Route::get('/ratings',[DashboardController::class,'ratings'])->name('ratings');
            Route::get('/favorites',[DashboardController::class,'favorites'])->name('favorites');
            Route::get('/account',[DashboardController::class,'account'])->name('account');
            Route::get('/notifications',[DashboardController::class,'notifications'])->name('notifications');
            Route::post('/account',[DashboardController::class,'updateAccount'])->name('updateAccount');
        });
        Route::name('chat.')->prefix('/chat')->group(function(){
            Route::get('/single/{id}',[ChatController::class,'single'])->name('single');
        });
        Route::get('/add_rating/{id}',[FrontendController::class,'add_rating'])->name('add_rating');
        Route::get('/report',[FrontendController::class,'report'])->name('report');
        Route::middleware('report.auth')->group(function(){
            Route::post('/report',[FrontendController::class,'submitReport'])->name('submitReport');
        });
    });
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::get('/update_cat_hierarchy',function(Request $request){
    $categories = Category::whereIn('id',explode(",",$request->ids))->get();
    foreach($categories as $cat){
        updateHierarchyThrough($cat);
    }
    return "Done";
});
Route::get('/generate_uid',function(){
    $ads = App\Models\Advertisement::all();
    foreach($ads as $ad){
        $ad->uid = generateAdUniqueId(7);
        $ad->save();
    } 
    return $ads->pluck('id');
});
Route::get('/broadcast',function(){
    $user = App\Models\User::active(1)->first();
    event(new App\Events\Admin\UserRegistered($user,'Done'));
    return $user;
});
