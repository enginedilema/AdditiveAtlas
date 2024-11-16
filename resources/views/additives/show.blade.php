@extends('layouts.base')
@section('title')
{!!$additive->translation(session('locale'))->additive_name!!}
@endsection

@section('h1')
{!!$additive->translation(session('locale'))->additive_name!!}
@endsection

@section('meta_description')
    Tot el que necessites saber sobre {{ $additive->translation(session('locale'))->additive_name }} ({{ $additive->additive_e_code }}): perills, usos, i normativa. Descobreix si realment és segur!
@endsection

@section('meta')
<!-- Meta OG Tags -->
<meta property="og:title" content="{{ $additive->additive_name }}" />
<meta property="og:description" content="{{ Str::limit('Discover everything about ' . $additive->additive_name, 150) }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ asset('share.jpg') }}" />
<meta property="og:type" content="article" />

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $additive->additive_name }}" />
<meta name="twitter:description" content="{{ Str::limit('Discover everything about ' . $additive->additive_name, 150) }}" />
<meta name="twitter:image" content="{{ asset('share.jpg') }}" />
@endsection

@section('head')
    @foreach(config('languages.available') as $language)
        <link rel="alternate" 
              href="{{ route('additives.show', [
                  'lang' => $language,
                    'name' => $additive->translation($language)->additive_name ? Str::slug($additive->translation($language)->additive_name) : 'no',
                    'code' => Str::slug($additive->additive_e_code) ? Str::slug($additive->additive_e_code) : 'no',
                    'id' => $additive->id,
              ]) }}" 
              hreflang="{{ $language }}" />
    @endforeach
@endsection

@section('content')
<div class="container mx-auto py-8">

    <!-- Información General del Aditivo -->
    <section class="bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-petroleumBlue mb-4">{{ $additive->additive_e_code }} - {!! $additive->translation(session('locale'))->additive_name !!}</h2>
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

    <!-- Atributos adicionales -->
    @foreach (['description', 'option_process', 'food_uses', 'industrial_uses', 'beneficial_properties', 'side_effects'] as $attribute)
        @if(!empty($additive->translation(session('locale'))->$attribute))
            <section class="bg-white p-6 rounded-lg shadow-md mb-8">
                {!! preg_replace('/<h2>(.*?)<\/h2>/', '<h2 class="text-3xl font-bold text-center mb-6">$1</h2>', $additive->translation(session('locale'))->$attribute) !!}            </section>
        @endif
    @endforeach

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


    <!-- Bloque de los 5 aditivos más visitados -->
    <section class="bg-lightGray p-6 rounded-lg shadow-md mb-8">
        <h3 class="text-2xl font-bold text-center mb-4">Top 5</h3>
        <ul class="list-disc list-inside">
            @foreach($topAdditives as $topAdditive)
                <li class="mb-2">
                    <a href="{{ route('additives.show', [
                'lang' => session('locale'),
                'name' => $topAdditive->translation(session('locale'))->additive_name ? Str::slug($topAdditive->translation(session('locale'))->additive_name) : 'no',
                'code' => Str::slug($topAdditive->additive_e_code) ? Str::slug($topAdditive->additive_e_code) : 'no-code',
                'id' => $topAdditive->id
            ]) }}"
                       class="text-petroleumBlue font-semibold hover:text-coralOrange transition duration-200">
                       {{ $topAdditive->additive_e_code }} - {!! $topAdditive->translation(session('locale'))->additive_name !!} 
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
        <!-- Navegación interna: Siguiente y Anterior -->
        <div class="flex justify-between mt-10">
            @if($previousAdditive)
                <a href="{{ route('additives.show', [
                    'lang' => session('locale'),
                    'name' => Str::slug($previousAdditive->additive_name) ?: 'no-name',
                    'code' => Str::slug($previousAdditive->additive_e_code) ?: 'no-code',
                    'id' => $previousAdditive->id
                ]) }}" class="text-petroleumBlue font-bold hover:text-coralOrange">
                    ← {{ $previousAdditive->additive_name }}
                </a>
            @else
                <span></span>
            @endif
    
            @if($nextAdditive)
                <a href="{{ route('additives.show', [
                    'lang' => session('locale'),
                    'name' => Str::slug($nextAdditive->additive_name) ?: 'no-name',
                    'code' => Str::slug($nextAdditive->additive_e_code) ?: 'no-code',
                    'id' => $nextAdditive->id
                ]) }}" class="text-petroleumBlue font-bold hover:text-coralOrange">
                    {{ $nextAdditive->additive_name }} →
                </a>
            @else
                <span></span>
            @endif
        </div>
@endsection
