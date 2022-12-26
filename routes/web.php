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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/representadas', 'PagesController@representantes')->name('representantes');
Route::get('/oficinas', 'PagesController@oficinas')->name('oficinas');
Route::get('/novedades', 'PagesController@novedades')->name('novedades');
Route::get('/novedad/{id}', 'PagesController@novedad')->name('novedad');
Route::get('/calidad', 'PagesController@calidad')->name('calidad');
Route::get('/solicitud-de-presupuesto', 'PagesController@cotizacion')->name('cotizacion');
Route::get('/categorias', 'PagesController@categorias')->name('categorias');
Route::get('/categoria/{id}', 'PagesController@categoria')->name('categoria');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::get('/rrhh', 'PagesController@rrhh')->name('rrhh');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/producto/{product}', 'PagesController@producto')->name('producto');
Route::post('enviar-postulacion', 'MailController@workWithUs')->name('send-workWithUs');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');

Route::get('/ficha-tecnica/{id}/{column}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}/{column}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
Route::post('/imagen-descrptiva/{id}', 'ProductController@borrarImagenDescriptiva')->name('borrar-imagen-descriptiva');
Route::get('/archive-download/{id}/{column}', 'ContentController@download')->name('archive-download');
Route::delete('/archive-destroy/{id}/{column}', 'ContentController@archiveDestroy')->name('archive-destroy');

Route::middleware('auth')->prefix('admin')->group(function () {

    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/updateInfo', 'HomeController@updateInfo')->name('home.update-info');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/get-compromise', 'CompanyController@getCompromise');
    Route::get('company/content/get-others', 'CompanyController@getOthers');
    /** Fin company*/

    /** Page Clients */
    Route::get('client/content', 'ClientController@content')->name('client.content');
    Route::post('client/content/generic-section/store', 'ClientController@store')->name('client.store');
    Route::post('client/content/generic-section/update', 'ClientController@update')->name('client.update');
    Route::post('client/updateInfo', 'ClientController@updateInfo')->name('client.update-info');
    Route::delete('client/content/{id}', 'ClientController@destroy')->name('client.content.destroy');
    Route::get('client/content/slider/get-list', 'ClientController@sliderGetList')->name('client.slider.get-list');
    /** Fin Clients*/

    /** Page representatives */
    Route::get('representative/content', 'RepresentativeController@content')->name('representative.content');
    Route::post('representative/content/generic-section/store', 'RepresentativeController@store')->name('representative.store');
    Route::post('representative/content/generic-section/update', 'RepresentativeController@update')->name('representative.update');
    Route::post('representative/updateInfo', 'RepresentativeController@updateInfo')->name('representative.update-info');
    Route::delete('representative/content/{id}', 'RepresentativeController@destroy')->name('representative.content.destroy');
    Route::get('representative/content/slider/get-list', 'RepresentativeController@sliderGetList')->name('representative.slider.get-list');
    /** Fin representatives*/

    /** Page office */
    Route::get('office/content', 'OfficeController@content')->name('office.content');
    Route::post('office/content/generic-section/store', 'OfficeController@store')->name('office.store');
    Route::post('office/content/generic-section/update', 'OfficeController@update')->name('office.update');
    Route::post('office/updateInfo', 'OfficeController@updateInfo')->name('office.update-info');
    Route::delete('office/content/{id}', 'OfficeController@destroy')->name('office.content.destroy');
    Route::get('office/content/slider/get-list', 'OfficeController@sliderGetList')->name('office.slider.get-list');
    /** Fin office*/

    /** Page Category */
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::get('category/content/{id}', 'CategoryController@findContent');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/update', 'CategoryController@update')->name('category.content.update');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    Route::delete('product/image/{id}', 'ProductController@ImageDestroy')->name('product.image.destroy');
    /** Fin product*/


    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/


    /** Page Product variable */
    Route::post('variable-product/content/store', 'VariableProductController@store')->name('variable-product.content.store');
    Route::post('variable-product/content', 'VariableProductController@update')->name('variable-product.content.update');
    Route::delete('variable-product/content/{id}', 'VariableProductController@destroy')->name('variable-product.content.destroy');
    /** Fin product variable*/
    

    /** Page representatives */
    Route::get('news/content', 'NewsController@content')->name('news.content');
    Route::post('news/content/generic-section/store', 'NewsController@store')->name('news.store');
    Route::post('news/content/generic-section/update', 'NewsController@update')->name('news.update');
    Route::post('news/updateInfo', 'NewsController@updateInfo')->name('news.update-info');
    Route::delete('news/content/{id}', 'NewsController@destroy')->name('news.content.destroy');
    Route::get('news/content/slider/get-list', 'NewsController@sliderGetList')->name('news.slider.get-list');
    /** Fin representatives*/

    /** Page Company */
    Route::get('quality/content', 'QualityController@content')->name('quality.content');
    Route::post('quality/content/store-slider', 'QualityController@storeSlider')->name('quality.content.storeSlider');
    Route::post('quality/content/update-slider', 'QualityController@updateSlider')->name('quality.content.updateSlider');
    Route::post('quality/content/update-info', 'QualityController@updateInfo')->name('quality.content.updateInfo');
    Route::delete('quality/content/{id}', 'QualityController@destroy')->name('quality.content.destroy');
    Route::get('quality/content/slider/get-list', 'QualityController@sliderGetList')->name('quality.slider.get-list');
    /** Fin company*/

    /** Page representatives */
    Route::get('rrhh/content', 'RRHHController@content')->name('rrhh.content');
    Route::post('rrhh/content/generic-section/store', 'RRHHController@store')->name('rrhh.store');
    Route::post('rrhh/content/generic-section/update', 'RRHHController@update')->name('rrhh.update');
    /** Fin representatives*/

    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
