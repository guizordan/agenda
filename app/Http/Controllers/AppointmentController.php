<?php

namespace App\Http\Controllers;
use Log;
use App\Appointment;
use App\Place;
use App\People;

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
      $places = Place::pluck('street','id');
      $people = People::pluck('fullName','id');
      return view('appointment.create')->with(['places' => $places, 'people' => $people]);
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'description' => 'required',
        'date' => 'required',
        'time' => 'required',
        'place_id' => 'required'
      ]);

      $appointment = new Appointment;
      $appointment->description = $request->description;
      $appointment->date = $request->date;
      $appointment->time = $request->time;
      $appointment->place_id = $request->place_id;
      $appointment->save();

      $appointment->people()->sync($request->people);
      $appointment->save();
      return redirect()->route('appointment.index')->with('success', 'Compromisso criado.');
    }

    public function edit($id)
    {
      $appointment = Appointment::findOrFail($id);
      $places = Place::pluck('street','id');
      $people = People::pluck('fullName','id');

      return view('appointment.edit',compact('appointment'))->with(['places' => $places, 'people' => $people]);
    }

    public function update($id, Request $request)
    {
      $this->validate($request, [
        'description' => 'required',
        'date' => 'required',
        'time' => 'required',
        'place_id' => 'required'
      ]);

      $appointment = Appointment::findOrFail($id);

      $appointment->description = $request->description;
      $appointment->date = $request->date;
      $appointment->time = $request->time;
      $appointment->place_id = $request->place_id;
      $appointment->save();

      $appointment->people()->sync($request->people);
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
