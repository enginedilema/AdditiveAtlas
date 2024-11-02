@extends('layouts.base')

@section('title', 'Search Results: '.$query)

@section('h1', 'Search Results for "'.$query.'"')

@section('content')
    @if($additives->isEmpty())
        <p class="text-center text-gray-500 mt-4">No results found for "{{ $query }}".</p>
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-mintGreen hover:text-coralOrange font-semibold">Return to Home</a>
        </div>
    @else
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @foreach ($additives as $additive)
                <div class="bg-white p-4 rounded shadow hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-bold text-petroleumBlue">
                        <a href="{{ route('additives.show', [
    'name' => $additive->additive_name ? Str::slug($additive->additive_name) : '',
    'code' => $additive->additive_e_code ? Str::slug($additive->additive_e_code) : '',
    'id' => $additive->id
]) }}" class="hover:text-coralOrange">{{ $additive->additive_e_code }}</a>
                    </h3>
                    <p class="text-gray-700 mt-2">{{ $additive->additive_name }}</p>

                    @if($additive->additive_message)
                        <p class="text-sm text-gray-500 mt-2">{{ $additive->additive_message }}</p>
                    @endif

                    @if($additive->food_category_desc)
                        <p class="text-sm text-gray-500 mt-2">{{ \Illuminate\Support\Str::limit($additive->food_category_desc, 100) }}</p>
                    @endif

                    <a href="{{ route('additives.show', [
    'name' => $additive->additive_name ? Str::slug($additive->additive_name) : 'no',
    'code' => $additive->additive_e_code ? Str::slug($additive->additive_e_code) : 'no',
    'id' => $additive->id
]) }}" class="text-mintGreen font-semibold mt-4 inline-block hover:text-coralOrange">View Details</a>
                </div>
            @endforeach
        </section>
    @endif
@endsection
