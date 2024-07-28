@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl mb-6">Listado de Pacientes</h2>
        <a href="{{ route('patients.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Añadir Paciente</a>
        <table class="min-w-full bg-white mt-6">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                    <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Edad</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($patients as $patient)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{ $patient->name }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $patient->age }}</td>
                        <td class="text-left py-3 px-4">
                            <a href="{{ route('patients.edit', $patient->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded">Editar</a>
                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
