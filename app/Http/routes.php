<?php

use Furbook\Cat;

Route::get('/', function() {
  return redirect('cats');
});

Route::get('about', function() {
  return view('about')
  ->with('number_of_cats', 9000);
});

Route::resource('cats', 'CatController');

Route::get('cats/breeds/{name}', 'CatController@indexByBreed');

Route::get('/teste', function() {
  //$cats = Cat::orderBy('name', 'asc')->get();

  $cat = Cat::ofBreed(3)->get();

  return $cat;
});
