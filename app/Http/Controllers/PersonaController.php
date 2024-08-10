<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
//--------------------------MIDDLEWARE METODOS    
    public function __construct()
    {
        // Middleware 'logi' solo a los métodos 'edit' y 'destroy'para que no puedan editar ni eliminar si no están logueados
        $this->middleware('auth')->only(['edit', 'destroy']);
    }
//-------------------------
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $persona = new Persona();
        return view('personas.create', compact('persona'));
    }

    public function store(CreatePersonaRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['cPerRnd'] = 'abc123xyz';

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        }

        Persona::create($validatedData);

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    public function edit($nPerCodigo)
    {
        $persona = Persona::findOrFail($nPerCodigo);
        return view('personas.edit', compact('persona'));
    }

    // public function update(CreatePersonaRequest $request, $nPerCodigo)
    // {
    //     $persona = Persona::findOrFail($nPerCodigo);
    //     $validatedData = $request->validated();
    //     $persona->update($validatedData);
    //     return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    // }

    public function update(CreatePersonaRequest $request, $nPerCodigo)
{
    $persona = Persona::findOrFail($nPerCodigo);

    // Filtramos los datos para eliminar cualquier valor null
    $validatedData = array_filter($request->validated());

    // Si hay una nueva imagen, la subimos y eliminamos la anterior
    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior si existe
        if ($persona->image) {
            \Storage::delete($persona->image);
        }

        // Guardar la nueva imagen
        $validatedData['image'] = $request->file('image')->store('images');
    }

    // Actualizamos la persona con los datos filtrados
    $persona->update($validatedData);

    return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
}

    // public function destroy($nPerCodigo)
    // {
    //     $persona = Persona::findOrFail($nPerCodigo);
    //     $persona->delete();
    
    //     return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
    // }

    public function destroy($nPerCodigo)
{
    $persona = Persona::findOrFail($nPerCodigo);

    // Eliminar la imagen del servidor si existe
    if ($persona->image) {
        \Storage::delete($persona->image);
    }

    $persona->delete();
    
    return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente.');
}


}
