<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/activites', [ActivityController::class, 'index'])->name('activities');
Route::get('/activites/{activity}', [ActivityController::class, 'show'])->name('activities.show');


Route::get('/resources', [ResourceController::class, 'index'])->name('resources');


Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Level
    Route::delete('levels/destroy', 'LevelController@massDestroy')->name('levels.massDestroy');
    Route::resource('levels', 'LevelController');

    // Subject
    Route::delete('subjects/destroy', 'SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::resource('subjects', 'SubjectController');

    // Lesson
    Route::delete('lessons/destroy', 'LessonController@massDestroy')->name('lessons.massDestroy');
    Route::resource('lessons', 'LessonController');

    // Resource
    Route::delete('resources/destroy', 'ResourceController@massDestroy')->name('resources.massDestroy');
    Route::post('resources/media', 'ResourceController@storeMedia')->name('resources.storeMedia');
    Route::post('resources/ckmedia', 'ResourceController@storeCKEditorImages')->name('resources.storeCKEditorImages');
    Route::resource('resources', 'ResourceController');

    // Text
    Route::delete('texts/destroy', 'TextController@massDestroy')->name('texts.massDestroy');
    Route::post('texts/media', 'TextController@storeMedia')->name('texts.storeMedia');
    Route::post('texts/ckmedia', 'TextController@storeCKEditorImages')->name('texts.storeCKEditorImages');
    Route::resource('texts', 'TextController');

    // Image
    Route::delete('images/destroy', 'ImageController@massDestroy')->name('images.massDestroy');
    Route::post('images/media', 'ImageController@storeMedia')->name('images.storeMedia');
    Route::post('images/ckmedia', 'ImageController@storeCKEditorImages')->name('images.storeCKEditorImages');
    Route::resource('images', 'ImageController');

    // Activity
    Route::delete('activities/destroy', 'ActivityController@massDestroy')->name('activities.massDestroy');
    Route::post('activities/media', 'ActivityController@storeMedia')->name('activities.storeMedia');
    Route::post('activities/ckmedia', 'ActivityController@storeCKEditorImages')->name('activities.storeCKEditorImages');
    Route::resource('activities', 'ActivityController');

    // Image Slider
    Route::delete('image-sliders/destroy', 'ImageSliderController@massDestroy')->name('image-sliders.massDestroy');
    Route::post('image-sliders/media', 'ImageSliderController@storeMedia')->name('image-sliders.storeMedia');
    Route::post('image-sliders/ckmedia', 'ImageSliderController@storeCKEditorImages')->name('image-sliders.storeCKEditorImages');
    Route::resource('image-sliders', 'ImageSliderController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::resource('pages', 'PageController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
