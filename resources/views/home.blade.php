@extends('layouts.base')

@section('title', 'Home')

@section('content')
<main class="container mx-auto p-8">
    <!-- Listado de Cajas en Tres Columnas -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Caja de Ejemplo -->
      @foreach ($additives as $additive)
      <div class="bg-white p-4 rounded shadow hover:shadow-lg transition-shadow">
        <h3 class="text-xl font-bold text-petroleumBlue">
          <a href="{{ route('additives.show', [
    'name' => $additive->additive_name ? Str::slug($additive->additive_name) : 'no',
    'code' => $additive->additive_e_code ? Str::slug($additive->additive_e_code) : 'no',
    'id' => $additive->id
]) }}" class="hover:text-coralOrange">{{$additive->additive_e_code}}</a>
        </h3>
        <p class="text-gray-700 mt-2">{{$additive->additive_name}}</p>
      </div>
      @endforeach

    </section>
@endsection

