@extends('layouts.base')
@section('title')
{!!$additive->additive_name!!}
@endsection

@section('h1')
{!!$additive->additive_name!!}
@endsection

@section('meta_description')
    Tot el que necessites saber sobre {{ $additive->additive_name }} ({{ $additive->additive_e_code }}): perills, usos, i normativa. Descobreix si realment és segur!
@endsection

@section('content')
<div class="container mx-auto py-8">

    <!-- Información General del Aditivo -->
    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-petroleumBlue mb-4">{{ $additive->additive_e_code }} - {!! $additive->additive_name !!}</h2>
        <p class="text-gray-700 mb-4">{{ $additive->additive_message ?? 'No additional message available for this additive.' }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p><strong>INS Code:</strong> {{ $additive->additive_inss_code ?? 'N/A' }}</p>
                <p><strong>Synonyms:</strong> {{ $additive->additive_synonyms ?? 'N/A' }}</p>
                <p><strong>Included in Group:</strong> {{ $additive->member_of_groups ?? 'N/A' }}</p>
            </div>
            <div>
                <p><strong>FIP URL:</strong> 
                    <a href="{{ $additive->fip_url }}" target="_blank" class="text-mintGreen hover:text-coralOrange">More Details</a>
                </p>
                <p><strong>Additional Notes:</strong> {{ $additive->additive_note ?? 'N/A' }}</p>
            </div>
        </div>
    </section>

    <!-- Información Destacada -->
    <section class="bg-mintGreen text-white p-6 rounded-lg shadow-md mb-8">
        <h3 class="text-2xl font-bold text-center mb-4">Highlights of {!! $additive->additive_name !!}</h3>
        <p class="text-center">Discover important aspects about this additive, including its safety, usage limits, and regulatory status.</p>
    </section>

    <!-- Tabla de Categorías Alimentarias -->
    <h2 class="text-3xl font-bold text-center mb-6">Food Additive Categories</h2>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
        <thead>
            <tr class="bg-mintGreen text-white">
                <th class="py-3 px-4 border-b">Food Category Level</th>
                <th class="py-3 px-4 border-b">Food Category</th>
                <th class="py-3 px-4 border-b">Description</th>
                <th class="py-3 px-4 border-b">Restriction</th>
                <th class="py-3 px-4 border-b">Legislation</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr class="text-center border-b hover:bg-lightGray">
                    <td class="py-2 px-4">{{ $category->food_category_level }}</td>
                    <td class="py-2 px-4">{{ $category->food_category }}</td>
                    <td class="py-2 px-4">
                        <span class="relative group">
                            <!-- Truncated description with tooltip on hover -->
                            {{ Str::limit($category->food_category_desc, 50) }}
                            @if(strlen($category->food_category_desc) > 50)
                                <span class="absolute hidden group-hover:block bg-gray-800 text-white text-sm rounded p-2 w-64 z-10 top-full mt-2 shadow-lg">
                                    {{ $category->food_category_desc }}
                                </span>
                            @endif
                        </span>
                    </td>
                    <td class="py-2 px-4">{{ $category->restriction_value ?? 'N/A' }} {{ $category->restriction_unit ?? '' }}<br>
                        <small>{!! $category->restriction_comment ?? '' !!}</small>
                    </td>
                    <td class="py-2 px-4">
                        <ul>
                            @foreach($additives as $additiveItem)
                                @if($additiveItem->food_category_level === $category->food_category_level)
                                    <li class="mb-2">
                                        <span class="text-gray-700">{{ $additiveItem->legislation_short ?? 'N/A' }}</span>
                                        @if($additiveItem->legislation_url != NULL)
                                            <a href="{{ $additiveItem->legislation_url }}" target="_blank" class="text-mintGreen hover:text-coralOrange">View</a>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
