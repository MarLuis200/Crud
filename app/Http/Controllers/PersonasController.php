<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $personas = Personas::latest()->paginate(5);
      
        return view('personas.index',compact('personas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
      
        Personas::create($request->all());
       
        return redirect()->route('personas.index')
                        ->with('success','Personas Creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personas $persona): View
    {
        return view('personas.show',compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personas $persona): View
    {
        return view('personas.edit',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personas $persona): RedirectResponse
    {
        $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'ap' => 'required',
            'am' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
      
        $persona->update($request->all());
      
        return redirect()->route('personas.index')
                        ->with('success','Persona updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personas $persona): RedirectResponse
    {
        $persona->delete();
       
        return redirect()->route('personas.index')
                        ->with('success','Persona deleted successfully');
    }
}
