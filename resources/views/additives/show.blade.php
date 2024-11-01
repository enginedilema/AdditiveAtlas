@extends('layouts.base')
@section('title', $additive->additive_name)

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-6">Food Additives Table</h1>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
        <thead>
            <tr class="bg-mintGreen text-white">
                <th class="py-3 px-4 border-b">Food Category Level</th>
                <th class="py-3 px-4 border-b">Food Category</th>
                <th class="py-3 px-4 border-b">Restriction Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($additives as $additive)
                <tr class="text-center border-b hover:bg-lightGray">
                    <td class="py-2 px-4">{{ $additive->food_category_level }}</td>
                    <td class="py-2 px-4">{{ $additive->food_category }}</td>
                    <td class="py-2 px-4">{{ $additive->restriction_value ?? 'N/A' }} {{$additive->restriction_unit}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection