<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleController extends Controller {

    public function index()
    {
     $people = People::all();
     return view('people.index')->with('people', $people);
    }

    public function create()
    {
      return view('people.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'fullName' => 'required',
        'email' => 'required'
      ]);

      $people = new People;
      $people->fullName = $request->fullName;
      $people->email = $request->email;
      $people->phone = $request->phone;
      $people->save();
      return redirect()->route('people.index')->with('success', 'Pessoa Cadastrada.');
    }

    public function edit($id)
    {
      $person = People::findOrFail($id);
      return view('people.edit', compact('person'));
    }

    public function update($id, Request $request)
    {
      $this->validate($request, [
        'fullName' => 'required',
        'email' => 'required'
      ]);

      $people = People::findOrFail($id);
      $people->fullName = $request->fullName;
      $people->email = $request->email;
      $people->phone = $request->phone;
      $people->save();
      return redirect()->route('people.index')->with('success', 'Pessoa atualizada.');
    }

    public function destroy($id)
    {
      $people = People::findOrFail($id);
      $people->delete();
      return redirect()->route('people.index')->with('success','Pessoa removida');
    }
}
