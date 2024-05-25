<?php

namespace App\Http\Controllers\Cruds;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Models\Driver;
use Illuminate\Http\Request;

class TripController extends Controller
{
    //
    public function index(){
        $trips = Trip::all();
        return view('cruds.trips.index', compact('trips'));
    }

    public function create(){
        $drivers = Driver::all();

        return view('cruds.trips.create', compact('drivers'));
    }

    public function store(Request $request){

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_km' => 'required|integer',
            'end_km' => 'required|integer|gte:start_km',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $trip = Trip::create($request->only(['start_date', 'end_date', 'start_km', 'end_km', 'vehicle_id']));

        $motoristas = $request->input('drivers');
        
        foreach($motoristas as $motorista){
            $trip->drivers()->attach(Driver::find($motorista));
        }

        return redirect()->route('trips.index');
    }

    public function edit(string $id){
        if(!$trip = Trip::find($id)){
            return redirect()->route('trips.index')->with('message', 'Usuário não encontrado');
        }
        $drivers = Driver::all();

        return view('cruds.trips.edit', compact('trip', 'drivers'));
    }

    public function update(Request $request, $trip_id){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_km' => 'required|integer',
            'end_km' => 'required|integer|gte:start_km',
            'vehicle_id' => 'required|exists:vehicles,id',
            'drivers' => 'required'
        ]);

        $trip = Trip::find($trip_id);
        $trip->update($request->only(['start_date', 'end_date', 'start_km', 'end_km', 'vehicle_id']));

        $trip->drivers()->sync(array_values($request->input('drivers')));

        return redirect()->route('trips.index');
    }

    public function show(string $id){
        if(!$trip = Trip::find($id)){
            return redirect()->route('trips.index')->with('message', 'Usuário não encontrado');
        }

        return view('cruds.trips.show', compact('trip'));
    }

    public function destroy(string $id)
    {
        if(!$trip = Trip::find($id)){
            return redirect()->route('trips.index')->with('message', 'Usuário não encontrado');
        }

        $trip->delete();
        return redirect()->route('trips.index')->with('sucess', 'Viagem deletado com sucesso');
    }
}
