<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peliculas.index', ['peliculas'=>Pelicula::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título debe contener menos de 255 caracteres.',
        ]);
        Pelicula::create($validated);
        session()->flash('exito', 'Libro creado correctamente.');
        return redirect()->route('peliculas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', ['pelicula'=>$pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', [
            'pelicula'=>$pelicula
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'titulo.max' => 'El título debe contener menos de 255 caracteres.',
        ]);
        $pelicula->fill($validated);
        $pelicula->save();
        session()->flash('exito', 'pelicula modificada correctamente.');
        return redirect()->route('peliculas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        foreach ($pelicula->proyecciones as $proyeccion)
        if ($proyeccion->entradas->count() > 0){
            return redirect()->route('peliculas.index');
        }
        $pelicula->delete();
        return redirect()->route('peliculas.index');
    }
}
