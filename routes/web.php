<?php

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

Route::get('/cms-features', 'cms@getFeatures')->name('cms-features');
Route::put('/cms-features', 'cms@updateFeatures')->name('cms-features');
Route::post('/cms-features', 'cms@addFeatures')->name('cms-features');


Route::get('/cms-partners', 'cms@getPartners')->name('cms-partners');
Route::put('/cms-partners', 'cms@updatePartners')->name('cms-partners');
Route::post('/cms-partners', 'cms@addPartners')->name('cms-partners');

Route::get('/cms-analytics', 'cms@getAnalytics')->name('cms-analytics');
Route::put('/cms-analytics', 'cms@updateAnalytics')->name('cms-analytics');
Route::post('/cms-analytics', 'cms@addAnalytics')->name('cms-analytics');

Route::get('/cms-solutions', 'cms@getSolutions')->name('cms-solutions');
Route::put('/cms-solutions', 'cms@updateSolutions')->name('cms-solutions');
Route::post('/cms-solutions', 'cms@addSolutions')->name('cms-solutions');

Route::get('/cms-request', 'cms@getRequest')->name('cms-request');
Route::post('/cms-request', 'cms@postRequest')->name('cms-request');

Route::get('/cms-home', 'cms@getHome')->name('cms-home');
Route::post('/cms-home', 'cms@postHome')->name('cms-home');

Route::get('/cms-profile', 'cms@getProfile')->name('cms-profile');
Route::post('/cms-profile', 'cms@postProfile')->name('cms-profile');

Route::get('/cms-dashboard', 'cms@dashboard')->name('cms-dashboard');

Route::post('/contact', 'index@postContact')->name('contact');

Route::get('/', 'index@index')->name('index');
