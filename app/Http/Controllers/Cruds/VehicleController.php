<?php

namespace App\Http\Controllers\Cruds;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    //
    public function index(){
        $vehicles = Vehicle::all();

        return view('cruds.vehicles.index', compact('vehicles'));
    }
    
    public function create(){
        return view('cruds.vehicles.create');
    }

    public function store(Request $request){

        $request->validate([
            'model' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'km_acquisition' => 'required|integer',
            'date_acquisition' => 'required|date',
            'renavam' => 'required|unique:vehicles',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index');
    }

    public function edit(string $id){
        if(!$vehicle = Vehicle::find($id)){
            return redirect()->route('vehicles.index')->with('message', 'Usuário não encontrado');
        }

        return view('cruds.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $vehicle_id){
        $request->validate([
            'model' => 'required',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'km_acquisition' => 'required|integer',
            'date_acquisition' => 'required|date',
            'renavam' => 'required|unique:vehicles,renavam,' . $vehicle_id,
        ]);

        $vehicle = Vehicle::find($vehicle_id);

        $vehicle->update($request->all());
        return redirect()->route('vehicles.index');
    }

    public function show(string $id){
        if(!$vehicle = Vehicle::find($id)){
            return redirect()->route('vehicles.index')->with('message', 'Usuário não encontrado');
        }

        return view('cruds.vehicles.show', compact('vehicle'));
    }

    public function destroy(string $id)
    {
        if(!$vehicle = Vehicle::find($id)){
            return redirect()->route('vehicle.index')->with('message', 'Usuário não encontrado');
        }

        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('sucess', 'Veículo deletado com sucesso');
    }
}
