<?php

namespace App\Http\Controllers\Cruds;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    public function index(){
        $drivers = Driver::all();

        return view('cruds.drivers.index', compact('drivers'));
    }

    public function create(){
        return view('cruds.drivers.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date|before:-18 years',
            'cnh' => 'required',
        ]);

        $driver = Driver::create($request->all());

        return redirect()->route('drivers.index');

    }

    public function edit(string $id){
        if(!$driver = Driver::find($id)){
            return redirect()->route('drivers.index')->with('message', 'Usuário não encontrado');
        }
        return view('cruds.drivers.edit', compact('driver'));
    }

    public function update(Request $request, $driver_id)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required|date|before:-18 years',
            'cnh' => 'required',
        ]);

        $driver = Driver::find($driver_id);

        $driver->update($request->all());
        return redirect()->route('drivers.index');
    }
    
    public function show(string $id)
    {
        if(!$driver = Driver::find($id)){
            return redirect()->route('drivers.index')->with('message', 'Usuário não encontrado');
        }

        $driver = Driver::find($id);
        return view('cruds.drivers.show', compact('driver'));
    }

    public function destroy(string $id)
    {
        if(!$driver = Driver::find($id)){
            return redirect()->route('drivers.index')->with('message', 'Usuário não encontrado');
        }

        $driver->delete();
        return redirect()->route('drivers.index')->with('sucess', 'Motorista deletado com sucesso');
    }
}
