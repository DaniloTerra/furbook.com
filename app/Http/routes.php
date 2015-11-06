<?php

Route::get('/', function() {
  return redirect('cats');
});

Route::get('about', function() {
  return view('about')
  ->with('number_of_cats', 9000);
});

Route::get('cats', function() {
  $cats = Furbook\Cat::all();

  return view('cats.index')->with('cats', $cats);
});

Route::get('cats/breeds/{name}', function($name) {
  $breed = Furbook\Breed::with('cats')->whereName($name)->first();

  return view('cats.index')
    ->with('breed', $breed)
    ->with('cats', $breed->cats);
});

Route::get('cats/{id}', function($id) {
  $cat = Furbook\Cat::find($id);

  return view('cats.show')->with('cat', $cat);
})->where('id', '[0-9]+');
