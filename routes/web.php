<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UiController;

use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');
Route::get('/',[UiController::class,'home'])->name('home');
Route::get('/service',[UiController::class,'service'])->name('service');
Route::get('/contact',[UiController::class,'contact'])->name('contact');

Route::middleware('auth')->group(function(){

Route::get('/user/category/post/{id}',[UiController::class,'categoryPostList'])->name('user.category.post.list');
Route::get('/user/history',[UiController::class,'userHistory'])->name('user.history');
Route::get('/newfeed/post',[UiController::class,'newFeedPosts'])->name('newfeed.posts');
Route::get('/newFeed/post/detail/{id}',[UiController::class,'newfeePostDetail'])->name('newFeed.post.detail');
Route::post('user/booking/create',[UiController::class,'createBooking'])->name('user.create.booking');
Route::get('user/profile/photo/edit',[UiController::class,'userPhotoEdit'])->name('user.photo.edit');
Route::put('user/profile/phto/update',[UiController::class,'userPhotoUpdate'])->name('user.photo.update');
Route::get('user/password/edit',[UiController::class,'userPasswordEdit'])->name('user.password.edit');
Route::post('user/password/update',[UiController::class,'userPasswordUpdate'])->name('user.password.update');
Route::get('user/profile',[UiController::class,'userProfile'])->name('user.profile');
Route::get('/ui/serviceProvider/list',[UiController::class,'serviceProviderList'])->name('ui.serviceProvider.list');
Route::get('/ui/serviceProvider/detail/{id}',[UiController::class,'serviceProviderDetail'])->name('ui.serviceProvider.detail');
Route::get('/ui/serviceProvider/post/list/{id}',[UiController::class,'serviceProviderPostList'])->name('ui.serviceProvider.post.list');
Route::post('ui/review/store',[ReviewController::class,'uiReviewStore'])->name('ui.review.store');

Route::get('ui/review/delete/{id}',[ReviewController::class,'reviewDelete'])->name('ui.review.delete');


});



Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/index',[AdminController::class,'index'])->name('admin.index');
    Route::get('/profile/index',[AdminController::class,'adminProfile'])->name('admin.profile.index');
    Route::get('/profile/edit',[AdminController::class,'adminProfileEdit'])->name('admin.profile.edit');
    Route::put('/profile/update',[AdminController::class,'adminProfileUpdate'])->name('admin.profile.update');
     Route::get('/customer/list',[AdminController::class,'customerList'])->name('admin.customers.list');
     Route::delete('/customer/delete/{id}',[AdminController::class,'customerDelete'])->name('admin.customer.delete');
     Route::get('/customer/info/{id}',[AdminController::class,'customerDetail'])->name('admin.customer.detail');
     Route::get('/user/info/edit/{id}',[AdminController::class,'userProfileEdit'])->name('admin.user.profile.edit');
     Route::put('/user/info/update/{id}',[AdminController::class,'userProfileUpdate'])->name('admin.user.profile.update');
     Route::get('/customer/detail/booking/list/{id}',[AdminController::class,'userBookingList'])->name('admin.user.booking.list');
     Route::get('/booking/list',[AdminController::class,'bookingList'])->name('admin.booking.list');
     Route::get('/service/list',[AdminController::class,'serviceList'])->name('admin.services.list');
     Route::get('/service/detail/{id}',[AdminController::class,'serviceDetail'])->name('admin.service.detail');
     Route::get('/service/detail/post/list/{id}',[AdminController::class,'servicePostList'])->name('admin.service.post.list');
     Route::get('/post/detail/{id}',[AdminController::class,'postDetail'])->name('admin.post.detail');


     Route::get('/service/categry/list',[CategoryController::class,'categoryList'])->name('admin.service.category.list');
     Route::get('/service/categry/create',[CategoryController::class,'categoryCreate'])->name('admin.service.category.create');
     Route::post('/service/categry/store',[CategoryController::class,'categoryStore'])->name('admin.service.category.store');
     Route::delete('service/category/{id}', [CategoryController::class, 'categoryDelete'])->name('admin.service.category.delete');
     Route::get('/service/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('admin.service.category.edit');
     Route::put('/service/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('admin.service.category.update');
     Route::get('/posts/list',[AdminController::class,'postList'])->name('admin.posts.list');
     Route::put('/post/accept/{id}', [AdminController::class, 'postAccept'])->name('admin.post.accept');
     Route::put('/post/reject/{id}',[AdminController::class,'postReject'])->name('admin.post.reject');

     Route::get('customer/review/list/{id}',[AdminController::class,'cusReviewList'])->name('admin.cust.review.list');
     Route::get('review/list',[ServiceController::class,'adminreviewList'])->name('admin.reviewAll.list');
    });


Route::prefix('service')->middleware('service')->group(function(){

    Route::get('/index',[ServiceController::class,'index'])->name('service.index');
    Route::get('/profile/index',[AuthController::class,'serviceProfile'])->name('service.profie.index');
    Route::get('/post/list',[PostController::class,'postList'])->name('service.post.list');
    Route::get('/post/create',[PostController::class,'postCreate'])->name('service.post.create');
    Route::post('/post/store',[PostController::class,'postStore'])->name('service.post.store');
    Route::delete('/post/delete/{id}',[PostController::class,'postDelete'])->name('service.post.delete');
    Route::get('/post/edit/{id}',[PostController::class,'postEdit'])->name('service.post.edit');
    Route::put('/post/update/{id}',[PostController::class,'postUpdate'])->name('service.post.update');

    Route::get('/profile/photo/edit',[AuthController::class,'serviceProfilePhotoEdit'])->name('service.photo.edit');
    Route::put('/profile/phto/update',[AuthController::class,'servicePhotoUpdate'])->name('service.photo.update');
    Route::get('/password/edit',[AuthController::class,'servicePasswordEdit'])->name('service.password.edit');
    Route::post('/password/update',[AuthController::class,'servicePasswordUpdate'])->name('service.password.update');


    Route::get('post/booking/list/{id}',[BookingController::class,'serviceBookingList'])->name('service.post.booking.list');
    Route::get('post/service/bookingList',[BookingController::class,'serviceBookingAll'])->name('service.booking.all');
    Route::put('booking/accept/{id}',[BookingController::class,'bookingAccept'])->name('booking.accept');
    Route::put('booking/reject/{id}',[BookingController::class,'bookingReject'])->name('booking.reject');
    Route::delete('booking/delete/{id}',[BookingController::class,'bookingDelete'])->name('service.booking.Delete');

    Route::get('review/list',[ServiceController::class,'reviewList'])->name('service.review.list');


});
