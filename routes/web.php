<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layouts.main');
})->name('dashboard');

Route::get('/',[MainController::class,'index'])->name('main');

Route::get('/main/{channel}/videos',[MainController::class,'channelsVideos'])->name('main.channels.videos');

Route::resource('/videos', VideoController::class);

Route::get('/video/search',[VideoController::class,'search'])->name('video.search');

Route::post('/like',[LikeController::class,'likeVideo'])->name('like');

Route::post('/view',[VideoController::class,'addView'])->name('view');

Route::post('/comment',[CommentController::class,'saveComment'])->name('comment');

Route::get('/comment/{id}/edit',[CommentController::class,'edit'])->name('comment.edit');

Route::patch('/comment/{id}',[CommentController::class,'update'])->name('comment.update');

Route::get('/comment/{id}',[CommentController::class,'destroy'])->name('comment.destroy');

Route::get('/history',[HistoryController::class,'index'])->name('history');

Route::delete('/history/{id}',[HistoryController::class,'destroy'])->name('history.destroy');

Route::delete('/destroyAll',[HistoryController::class,'destroyAll'])->name('history.destroyAll');

Route::get('/channel',[ChannelController::class,'index'])->name('channel.index');

Route::get('/channel/search',[ChannelController::class,'search'])->name('channel.search');

Route::post('/notification',[NotificationController::class,'index'])->name('notification');

Route::get('/notification',[NotificationController::class,'allNotification'])->name('all.notification');

Route::prefix('/admin')->middleware('can:update-videos')->group(function(){

    Route::get('/',[AdminsController::class,'index'])->name('admin.index');

    Route::get('/channels',[ChannelController::class,'adminIndex'])->name('channels.index');

    Route::patch('/{user}/channels',[ChannelController::class,'adminUpdate'])->name('channels.update')->middleware('can:update-users');
    
    Route::delete('/channels/{user}',[ChannelController::class,'adminDelete'])->name('channels.delete')->middleware('can:update-users');

    Route::patch('/{user}/block',[ChannelController::class,'adminBlock'])->name('channels.block')->middleware('can:update-users');

    Route::get('/channels/blocked',[ChannelController::class,'blockedChannels'])->name('channels.blocked');

    Route::patch('/{user}/open',[ChannelController::class,'openBlock'])->name('channels.open.block')->middleware('can:update-users');

    Route::get('/allChannels',[ChannelController::class,'allChannels'])->name('channels.all');

    Route::get('/MostViewedVideos',[VideoController::class,'mostViewedVideos'])->name('most.viewed.video');

});

/* Route::prefix('/admin')->middleware('can:update-users')->group(function(){

    Route::get('/',[AdminsController::class,'index'])->name('admin.index');

    Route::get('/channels',[ChannelController::class,'adminIndex'])->name('channels.index');
}); */