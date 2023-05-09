<?php

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

Route::get('/',App\Http\Controllers\AuteurController::class . '@index')->name('index');

Route::get('/mainpage', \App\Http\Controllers\AuteurController::class . '@accueilauteur')->name('auteur.accueilauteur');

Route::get('/newarticlecreate', \App\Http\Controllers\ArticleController::class . '@redirectajout')->name('article.ajouterarticle');

Route::post('/find', \App\Http\Controllers\ArticleController::class . '@recherchearticle')->name('article.findarticle');

Route::get('/edit=ART/{id}article', \App\Http\Controllers\ArticleController::class . '@getmodif')->name('article.modifyarticle');

Route::get('/publish-ART/{id}article', \App\Http\Controllers\ArticleController::class . '@publier')->name('article.publisharticle');

Route::get('/disconnect', \App\Http\Controllers\AuteurController::class . '@deconnexion')->name('auteur.deconnexion');


Route::get('/storage/{filename}', function ($filename)
{
    $path = storage_path('app/public/assets/img/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->name('storage');


// Fonction post generalisee
Route::post('/{controller}/{method}', function ($controller, $method, Request $request) {
    $controller = app()->make("App\\Http\\Controllers\\{$controller}Controller");
    return $controller->$method($request);
});

