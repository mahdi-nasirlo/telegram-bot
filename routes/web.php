<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $client = new Client();


    $url = "https://api.telegram.org/bot5804477816:AAHwphPvPG9Mz9JCVVgGS6jngIgocBdq45w/getMe";

    dd($client->get($url)->getBody());

    return view('welcome');
});
