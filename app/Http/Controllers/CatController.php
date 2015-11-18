<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;

use Furbook\Http\Requests;
use Furbook\Http\Controllers\Controller;
use Furbook\Cat;
use Furbook\Breed;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'List of all cats';
        $cats = Cat::all();

        return view('cats.index')->with('cats', $cats);
    }

    public function indexByBreed($name)
    {
        $breed = Breed::with('cats')->whereName($name)->first();

        return view('cats.index')->with('breed', $breed)->with('cats', $breed->cats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "Form to add cats";
        return view('cats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return "Save a new cat in the database";
        $cat = Cat::create($request->all());

        return redirect('cats/'.$cat->id)->withSuccess('Cat has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return "Show a cat profile";
        $cat = Cat::find($id);

        return view('cats.show')->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "Form to edit a cat";

        $cat = Cat::find($id);

        return view('cats.edit')->with('cat', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return "Save a edited cat in the database";

        $cat = Cat::find($id);
        $cat->update($request->all());

        return redirect('cats/'.$cat->id)->withSuccess('Cat has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return 'Delete a cat in the database';
        Cat::destroy($id);

        return redirect('cats');
    }
}
