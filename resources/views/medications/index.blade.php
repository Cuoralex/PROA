@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl mb-6">Listado de Medicamentos</h2>
        <a href="{{ route('medications.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Añadir Medicamento</a>
        <table class="min-w-full bg-white mt-6">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($medications as $medication)
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">{{ $medication->name }}</td>
                        <td class="text-left py-3 px-4">
                            <a href="{{ route('medications.edit', $medication->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded">Editar</a>
                            <form action="{{ route('medications.destroy', $medication->id) }}" method="POST" class="inline-block">
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
