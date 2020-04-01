<?php

use App\Events\MyEvent;

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

Route::get('/', function () {
    \Illuminate\Support\Facades\Redis::set('aa', 'aaa');
    event(new MyEvent());
//    MyEvent::broadcast()
    return "Event has been sent!";

});
Route::get('/e', function () {
//    Cache::put('sasa','asas23322',10);
//    return Cache::get('sasa');
//        \Illuminate\Support\Facades\Redis::g
//Redis::
//    \Illuminate\Support\Facades\Redis::
    \Illuminate\Broadcasting\Broadcasters\RedisBroadcaster::broadcast();
});
Route::get('/w', function () {
    return view('chat');
});
Route::get('/socket_io', function () {
    return view('chat_socket_io');
});
