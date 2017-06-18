<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoalsController extends Controller {

    public function index()
    {
     $goals = Goal::all();
     return view('goals.index')->with('goals', $goals);
    }

    public function create()
    {
      return view('goals.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required'
      ]);

      $goal = new Goal;
      $goal->name = $request->name;
      $goal->accomplished = false;
      $goal->save();
      return redirect()->route('goals.index')->with('success', 'Meta Cadastrada.');
    }

    public function edit($id)
    {
      $goal = Goal::findOrFail($id);
      return view('goals.edit', compact('goal'));
    }

    public function update($id, Request $request)
    {
      $this->validate($request, [
        'name' => 'required'
      ]);

      if($request->accomplished == null){
        $request->accomplished = false;
      }

      $goal = Goal::findOrFail($id);
      $goal->name = $request->name;
      $goal->accomplished = $request->accomplished;
      $goal->save();
      return redirect()->route('goals.index')->with('success', 'Meta atualizada.');
    }

    public function destroy($id)
    {
      $goal = Goal::findOrFail($id);
      $goal->delete();
      return redirect()->route('goals.index')->with('success','Meta removida');
    }
}
