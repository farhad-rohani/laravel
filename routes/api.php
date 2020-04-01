<?php

use App\Mail\loginToAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('sds', function () {
    Mail::send(new loginToAccount('ahmad'));
    $telegram = new Api('782843740:23c73154d688a54da7d9c8749f23b475308941b8', true);
    $u = $telegram->getWebhookUpdates();
    $telegram->sendMessage([
        'chat_id' => $u->getMessage()->getChat()->getId(),
        'text' => $u->getMessage()->getText(),
        "forceReply" => false
    ]);

    $telegram->sendPhoto([
        'chat_id' => $u->getMessage()->getChat()->getId(),
        'photo' => 'https://5.imimg.com/data5/OF/GC/MY-4584302/red-rose-flower-500x500.jpg',
        'caption' => $u->getMessage()->getText(),
    ]);

});
