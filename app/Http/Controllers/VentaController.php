<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $ventas = Venta::latest()->paginate(5);
      
        return view('ventas.index', compact('ventas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'producto_vendido' => 'required',
            'costo' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);
      
        Venta::create($request->all());
       
        return redirect()->route('ventas.index')
                        ->with('success', 'Venta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta): View
    {
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta): View
    {
        return view('ventas.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta): RedirectResponse
    {
        $request->validate([
            'producto_vendido' => 'required',
            'costo' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);
      
        $venta->update($request->all());
      
        return redirect()->route('ventas.index')
                        ->with('success', 'Venta updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta): RedirectResponse
    {
        $venta->delete();
       
        return redirect()->route('ventas.index')
                        ->with('success', 'Venta deleted successfully');
    }
}

