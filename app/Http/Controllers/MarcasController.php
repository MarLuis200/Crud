<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $marcas = Marcas::latest()->paginate(5);
      
        return view('marcas.index', compact('marcas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ejemplo de validación para imagen
        ]);

        // Subir y guardar la imagen
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(('uploads'), $imageName);
            $request->merge(['imagen' => $imageName]);
        }
      
        Marcas::create($request->all());
       
        return redirect()->route('marcas.index')
                        ->with('success', 'Marca creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marcas $marca): View
    {
        return view('marcas.show', compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marcas $marca): View
    {
        return view('marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marcas $marca): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación opcional para imagen
        ]);

        // Subir y actualizar la imagen
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('uploads'), $imageName);
            $request->merge(['imagen' => $imageName]);
        }

        $marca->update($request->all());
      
        return redirect()->route('marcas.index')
                        ->with('success', 'Marca actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marcas $marca): RedirectResponse
    {
        $marca->delete();
       
        return redirect()->route('marcas.index')
                        ->with('success', 'Marca eliminada correctamente.');
    }
}
