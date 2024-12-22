<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Lectura;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Muestra la lista de clientes
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $clientes = Cliente::when($search, function ($query, $search) {
            return $query->where('matricula', 'like', "%$search%")
                         ->orWhere('nombres', 'like', "%$search%")
                         ->orWhere('apellidos', 'like', "%$search%");
        })->paginate(10);
    
        return view('clientes.index', compact('clientes'));
    }

    // Muestra el formulario para crear un nuevo cliente
    public function create()
    {
        // Obtener el último cliente registrado
        $ultimoCliente = Cliente::latest()->first();

        // Obtener el total de clientes
        $totalClientes = Cliente::count();

        // Mostrar la vista de creación de cliente
        return view('clientes.create', compact('ultimoCliente', 'totalClientes'));
    }

    // Almacena un nuevo cliente
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'matricula' => 'required|string|unique:clientes',
            'cedula' => 'required|string',
            'apellidos' => 'required|string',
            'nombres' => 'required|string',
            'barrio' => 'nullable|string',
            'cel' => 'nullable|string',
            'direccion' => 'nullable|string',
            'email' => 'nullable|email',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        // Crear un nuevo cliente
        Cliente::create($request->all());

        // Verificar si existe una lectura para el cliente recién creado
        $lecturaExistente = Lectura::where('matricula', $request->matricula)
            ->where('ciclo_facturado', 1)
            ->first();

        if ($lecturaExistente) {
            // Redirigir con un mensaje de advertencia si ya existe una lectura
            return redirect()->route('clientes.index')->with('warning', 'Ya existe una lectura para este cliente.');
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    // Muestra el formulario para editar un cliente existente
    public function edit($id)
    {
        // Obtener el cliente por ID
        $cliente = Cliente::findOrFail($id);

        // Mostrar la vista de edición de cliente
        return view('clientes.edit', compact('cliente'));
    }

    // Actualiza un cliente existente
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'matricula' => 'required|string|unique:clientes,matricula,' . $id,
            'cedula' => 'required|string',
            'apellidos' => 'required|string',
            'nombres' => 'required|string',
            'barrio' => 'nullable|string',
            'cel' => 'nullable|string',
            'direccion' => 'nullable|string',
            'email' => 'nullable|email',
            'fecha_nacimiento' => 'nullable|date',
        ]);

        // Obtener el cliente por ID
        $cliente = Cliente::findOrFail($id);

        // Actualizar los datos del cliente
        $cliente->update($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }
}
