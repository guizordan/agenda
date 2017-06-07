<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller {

    public function index()
    {
     $appointments = Appointment::all();

     return view('appointments.index')
         ->with('appointments', $appointments);
    }

    public function create()
    {
      return view('appointments.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'description' => 'required',
          'date' => 'required',
      ]);

      Appointment::create($request->all());
      return redirect()->route('appointments.index')->with('success','Compromisso criado com sucesso');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $appointment = Appointment::find($id);
      return view('appointments.edit',compact('appointment'));
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
