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

Route::get('cats/create', function() {
  return view('cats.create');
});

Route::post('cats', function() {
  $cat = Furbook\Cat::create(Input::all());

  return redirect('cats/'.$cat->id)->withSuccess('Cat has been created.');
});

Route::get('cats/{id}/edit', function($id) {
  $cat = Furbook\Cat::find($id);

  return view('cats.edit')->with('cat', $cat);
});

Route::put('cats/{id}', function($id) {
  $cat = Furbook\Cat::find($id);

  $cat->update(Input::all());

  return redirect('cats/'.$cat->id)->withSuccess('Cat has been updated.');
});

Route::get('cats/{id}/delete', function($id) {
  return 'Formulário para excluir o Cat:'.$id;
});

Route::delete('cats/{id}', function($id) {
  $cat = Furbook\Cat::find($id);

  $cat->delete();

  return redirect('cats')->withSuccess('Cat has been deleted.');
});
