<?php

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

Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function () {

    Route::get('dashboard', 'Home@dashboard')->name('admin.home');

    Route::resource('users', 'Users')->except(['show']);
    Route::post('users/search', 'Users@serchUser')->name('users.search');

    Route::resource('categories', 'Categories')->except(['show']);
    Route::post('categories/search', 'Categories@serchCategory')->name('categories.search');

    Route::resource('adminstrations', 'Adminstrations')->except(['show']);
    Route::post('adminstrations/search', 'Adminstrations@serchAdminstration')->name('adminstrations.search');
    
    Route::resource('exports', 'Exports')->except(['show']);
    Route::get('exports/{id}', 'Exports@show')->name('exports.show');
    Route::post('exports/search', 'Exports@serchexport')->name('exports.search');
    Route::post('exports/main_file', 'Exports@update_main_file')->name('exports.update_main_file');
    Route::resource('export_attachments', 'Export_attachments')->except(['show']);
    Route::resource('export_reminders', 'Export_reminders')->except(['show']);

    Route::resource('imports', 'Imports')->except(['show']);
    Route::get('imports/{id}', 'Imports@show')->name('imports.show');
    Route::post('imports/search', 'Imports@serchimport')->name('imports.search');
    Route::resource('import_attachments', 'Import_attachments')->except(['show']);

    Route::resource('generals', 'Generals')->except(['show']);
    Route::get('generals/{id}', 'Generals@show')->name('generals.show');
    Route::post('generals/search', 'Generals@serchgeneral')->name('generals.search');
    Route::resource('general_attachments', 'General_attachments')->except(['show']);

    Route::resource('forms', 'Forms')->except(['show']);
    Route::get('forms/{id}', 'Forms@show')->name('forms.show');
    Route::post('forms/search', 'Forms@serchform')->name('forms.search');
    Route::resource('form_attachments', 'Form_attachments')->except(['show']);

    Route::resource('albums', 'Albums')->except(['show']);
    Route::get('albums/{id}', 'Albums@show')->name('albums.show');
    Route::post('albums/search', 'Albums@serchalbum')->name('albums.search');
    Route::resource('album_attachments', 'Album_attachments')->except(['show']);

    Route::resource('videos', 'Videos')->except(['show']);
    Route::get('videos/{id}', 'Videos@show')->name('videos.show');
    Route::post('videos/search', 'Videos@serchvideo')->name('videos.search');
    Route::resource('video_attachments', 'Video_attachments')->except(['show']);

    Route::resource('reminders', 'Reminders')->except(['show']);
    Route::get('reminders/{id}', 'Reminders@show')->name('reminders.show');
    Route::post('reminders/search', 'Reminders@serchreminder')->name('reminders.search');
    Route::resource('reminder_dates', 'Reminder_dates')->except(['show']);

    Route::resource('sub_categories', 'Sub_categories')->except(['show']);
    Route::get('sub_categories/create/{id}', 'Sub_categories@createSub')->name('sub_categories.createSub');
    Route::get('sub_categories/cat/{id}', 'Sub_categories@get')->name('sub_categories.cat');
    Route::get('sub_categories/catSub/{id}', 'Sub_categories@getSub')->name('sub_categories.catSub');

    Route::resource('departments', 'Departments')->except(['show']);
    Route::get('departments/create/{id}', 'Departments@createSub')->name('departments.createSub');
    Route::get('departments/admin/{id}', 'Departments@get')->name('departments.admin');
    Route::get('departments/adminDepts/{id}', 'Departments@getDepts')->name('departments.adminDepts');
    
});

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('frontend.landing');

Route::middleware('auth')->group(function () {
    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');
});




