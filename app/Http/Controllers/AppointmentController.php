<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller {

    public function index()
    {
     $appointments = Appointment::all();
     return view('appointment.index')->with('appointments', $appointments);
    }

    public function create()
    {
      return view('appointment.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'description' => 'required',
        'date' => 'required'
      ]);

      $appointment = new Appointment;
      $appointment->description = $request->description;
      $appointment->date = $request->date;
      $appointment->save();
      return redirect()->route('appointment.index')->with('success', 'Compromisso criado.');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
      $appointment = Appointment::findOrFail($id);
      return view('appointment.edit',compact('appointment'));
    }

    public function update($id, Request $request)
    {
      $this->validate($request, [
        'description' => 'required',
        'date' => 'required'
      ]);

      $appointment = Appointment::findOrFail($id);
      $appointment->description = $request->description;
      $appointment->date = $request->date;
      $appointment->save();
      return redirect()->route('appointment.index')->with('success', 'Compromisso atualizado.');
    }

    public function destroy($id)
    {
      $appointment = Appointment::findOrFail($id);
      $appointment->delete();
      return redirect()->route('appointment.index')->with('success','Compromisso apagado');
    }
}
