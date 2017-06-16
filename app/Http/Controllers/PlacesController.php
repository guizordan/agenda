<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacesController extends Controller {

    public function index()
    {
     $places = Place::all();
     return view('places.index')->with('places', $places);
    }

    public function create()
    {
      return view('places.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'neighborhood' => 'required',
        'street' => 'required',
        'number' => 'required'
      ]);

      $place = new Place;
      $place->neighborhood = $request->neighborhood;
      $place->street = $request->street;
      $place->number = $request->number;
      $place->save();
      return redirect()->route('places.index')->with('success', 'Local Cadastrado.');
    }

    public function edit($id)
    {
      $place = Place::findOrFail($id);
      return view('places.edit', compact('place'));
    }

    public function update($id, Request $request)
    {
      $this->validate($request, [
        'neighborhood' => 'required',
        'street' => 'required',
        'number' => 'required'
      ]);

      $place = Place::findOrFail($id);
      $place->neighborhood = $request->neighborhood;
      $place->street = $request->street;
      $place->number = $request->number;
      $place->save();
      return redirect()->route('places.index')->with('success', 'Local atualizado.');
    }

    public function destroy($id)
    {
      $place = Place::findOrFail($id);
      $place->delete();
      return redirect()->route('places.index')->with('success','Local removido.');
    }
}
