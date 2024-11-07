@extends('layouts.base')

@section('title', 'About Us')

@section('h1', 'About additiveAtlas.cat')

@section('content')
<div class="container mx-auto py-8">
    <section class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-bold text-petroleumBlue mb-4">Qui Som</h2>
        <p class="text-gray-700">
            Benvingut a <strong>additiveAtlas.cat</strong>, un recurs digital dissenyat per ajudar a comprendre millor els additius alimentaris que consumim cada dia. Aquesta pàgina ha estat creada com un projecte educatiu per l’assignatura de Desenvolupament d’Aplicacions Web (DAW) Mòdul 7, amb l’objectiu de crear una pàgina web amb una gran quantitat de URLs indexables, millorar el SEO i demostrar la importància de la difusió i monetització d'un projecte real.
        </p>
    </section>

    <section class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-bold text-petroleumBlue mb-4">Font de les Dades</h2>
        <p class="text-gray-700">
            Utilitzem la base de dades oficial de l'<a href="https://developer.datalake.sante.service.ec.europa.eu/api-details#api=228d6fda-9092-4c25-af9a-d537666ed0e5&operation=ea5e05d1-f567-4ed2-a316-b9466fd2f6e6" target="_blank" class="text-mintGreen hover:text-coralOrange">Unió Europea</a> sobre additius alimentaris per garantir la precisió i actualització constant de la informació proporcionada. Aquesta base de dades oficial inclou informació detallada sobre l'ús, la regulació i els riscos dels additius presents en els aliments.
        </p>
    </section>

    <section class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-bold text-petroleumBlue mb-4">Funcionalitats Clau</h2>
        <ul class="list-disc list-inside text-gray-700">
            <li><strong>Cercador d'Aditius:</strong> Permet als usuaris cercar additius alimentaris específics per nom o codi i obtenir informació detallada sobre cada un d’ells.</li>
            <li><strong>Friendly URL:</strong> Les URLs de cada additiu estan optimitzades per ser més descriptives i amigables amb els cercadors.</li>
            <li><strong>Sitemap XML:</strong> Generació automàtica d'un sitemap per facilitar la indexació del contingut a Google.</li>
            <li><strong>Classificació d'Aditius:</strong> Cada additiu està classificat per categoria d'aliment i nivell de risc, fent la navegació més fàcil i organitzada.</li>
        </ul>
    </section>

    <section class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-bold text-petroleumBlue mb-4">Objectiu Educatiu</h2>
        <p class="text-gray-700">
            Aquest projecte forma part del currículum de DAW M7, amb l'objectiu de capacitar els estudiants en el desenvolupament de pàgines web d'alt impacte, SEO, i tècniques de monetització. AdditiveAtlas.cat no només proporciona informació útil per als usuaris, sinó que també serveix com una plataforma educativa per aprendre sobre SEO, la importància de dades actualitzades i l'optimització de pàgines web.
        </p>
    </section>

    <section class="bg-white p-6 rounded shadow mb-8">
        <h2 class="text-2xl font-bold text-petroleumBlue mb-4">Monetització</h2>
        <p class="text-gray-700">
            Per tal de sostenir el projecte i com a part de l'experimentació en màrqueting digital, additiveAtlas.cat inclou espais per a publicitat mitjançant Google AdSense. Aquests anuncis estan dissenyats per no interferir amb l'experiència de l'usuari, sinó per complementar-la i ajudar a finançar el manteniment de la pàgina.
        </p>
    </section>
</div>
@endsection
