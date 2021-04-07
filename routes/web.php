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

Route::get('/home','MainController@home'); 
Route::get('/','MainController@home');
Route::get('/Contact-Us','MainController@contact');
Route::patch('/contact','MainController@sendmessage');
Route::get('/Warta-Jemaat','MainController@warta');
Route::get('/Khotbah','MainController@khotbah');
Route::get('/sermons-detail/{id}','MainController@sermonsdetail');
Route::get('/about/gallery','MainController@gallery');
Route::get('/Resources','MainController@resources');
Route::get('/Resources/pendalaman-alkitab','ResourceController@pa');
Route::get('/Blog','MainController@blog');
Route::get('/Blog-detail/{id}','MainController@blogdetail');
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@plogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function () {
    Route::get('/dashboard','DashboardController@index');
    //Akun
    // Route::get('/akun/administrator','A')
    //website
    Route::get('/website','WebsiteController@index');
    Route::post('/website','WebsiteController@store');
    Route::patch('/website/{id}','WebsiteController@update');
    //slider
    Route::get('/slider/all','SliderController@show');
    Route::get('/slider/addnew','SliderController@addnew');
    Route::post('/slider/addnew','SliderController@store');
    Route::get('/slider/{slider}/edit', function (App\Slider $slider) {
        return view('admin.slider.edit',compact('slider'));
    });
    Route::patch('/slider/{id}','SliderController@update');
    Route::delete('/slider/destroy/{id}','SliderController@destroy')->name('slider.destroy');
    Route::post('/slider/changestatus','SliderController@changestatus')->name('changestatus');
    //events

    Route::get('/events/all','EventsController@show');
    Route::get('/events/addnew','EventsController@addnew');
    Route::post('events/addnew','EventsController@store');
    Route::patch('/events/{id}','EventsController@update');
    Route::get('/events/{event}/edit', function (App\Event $events) {
        return view('admin.events.edit',compact('events'));
    });
    Route::delete('/events/destroy/{id}','EventsController@destroy');

    //Resources
    Route::get('/resources/pendalaman-alkitab','ResourceController@show');
    Route::get('/resources/bahan-katekisasi','ResourceController@bkshow');


    //Berita
    Route::get('/berita/all','BeritaController@show');
    Route::get('/berita/addnew','BeritaController@addnew');
    Route::post('/berita/addnew','BeritaController@store');
    // Route::get('/berita/{id}/edit','BeritaController@edit');
    Route::patch('/berita/{id}','BeritaController@update');
    Route::get('/berita/{berita}/edit', function (App\Berita $berita) {
        return view('admin.berita.edit',compact('berita'));
    });
    Route::delete('/berita/destroy/{id}','BeritaController@destroy');

    //Sermons
    Route::get('/sermons/all','SermonsController@show');
    Route::get('/sermons/addnew','SermonsController@addnew');
    Route::post('/sermons/addnew','SermonsController@store');
    Route::get('/sermons/{id}/edit','SermonsController@edit');
    Route::patch('/sermons/{id}','SermonsController@update');
    Route::delete('/sermons/destroy/{id}','SermonsController@destroy');
    Route::get('/sermons/kategori','SermonsController@kategori');
    Route::post('/sermons/kategori','SermonsController@storekategori');
    Route::post('/sermons/kategori/{id}/editkategori','SermonsController@editkategori');
    Route::delete('/sermons/kategori/destroy/{id}','SermonsController@kategoridestroy');

    //Warta
    Route::get('/warta/all','WartaController@show');
    Route::post('/warta/addnew','WartaController@store');
    Route::delete('/warta/destroy/{id}','WartaController@destroy');

    //Gallery
    Route::get('/gallery/all','GalleryController@show');
    Route::get('/gallery/addnew','GalleryController@addnew');
    Route::get('/gallery/{id}/edit','GalleryController@edit');
    Route::patch('/gallery/{id}','GalleryController@update');
    Route::post('/gallery/addnew','GalleryController@store');
    Route::delete('/gallery/destroy/{id}','GalleryController@destroy');
});

