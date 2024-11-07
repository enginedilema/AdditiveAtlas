<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    @yield('title')
    - additiveAtlas.cat
  </title>
  <!-- Google Analytics -->
  @include('layouts.analytics')
  <meta name="description" content="@yield('meta_description', 'Descobreix què s’amaga darrere dels additius alimentaris: impacte, riscos, i molt més en additiveAtlas.cat. Tot el que Google no t’explicarà directament!')">
  <script src="https://cdn.tailwindcss.com"></script>
@vite('resources/css/app.css')
</head>
<body class="bg-lightGray text-petroleumBlue font-sans">

  <!-- Cabecera -->
  @include('layouts.nav')

  <!-- Cuerpo Principal -->
  <main class="container mx-auto p-8">
    <!-- Columna de Contenido -->
    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
      <h1 class="text-4xl font-extrabold text-center text-petroleumBlue mb-4"> @yield('h1')</h1>
      @section('content')
      <p class="text-lg text-center text-gray-700">
        Welcome to additiveAtlas.cat, your comprehensive guide to food additives. Here, you'll find detailed information about each additive, their uses, and potential impacts.
      </p>
      @show
    </section>

<!-- Interlinking -->
<section class="bg-white p-6 rounded-lg shadow-md mt-8">
  <h2 class="text-2xl font-bold text-mintGreen mb-4 text-center">Explore More</h2>
  <ul class="flex flex-wrap justify-center gap-4">
      <li class="w-full sm:w-auto">
          <a href="#" class="block w-full max-w-xs px-6 py-3 bg-lightGray rounded-lg text-center text-coralOrange font-semibold hover:text-white hover:bg-petroleumBlue transition duration-200 ease-in-out shadow-md">
              Additive Groups
          </a>
      </li>
      <li class="w-full sm:w-auto">
          <a href="#" class="block w-full max-w-xs px-6 py-3 bg-lightGray rounded-lg text-center text-coralOrange font-semibold hover:text-white hover:bg-petroleumBlue transition duration-200 ease-in-out shadow-md">
              Popular Additives
          </a>
      </li>
      <li class="w-full sm:w-auto">
          <a href="#" class="block w-full max-w-xs px-6 py-3 bg-lightGray rounded-lg text-center text-coralOrange font-semibold hover:text-white hover:bg-petroleumBlue transition duration-200 ease-in-out shadow-md">
              Legislation Updates
          </a>
      </li>
  </ul>
</section>

  </main>

  <!-- Footer -->
  <footer class="bg-petroleumBlue p-8 text-center text-white">
    <div class="container mx-auto space-y-4">
      <ul class="flex justify-center space-x-8">
        <li><a href="#" class="hover:text-mintGreen font-semibold transition duration-200 ease-in-out">Política de Privacidad</a></li>
        <li><a href="#" class="hover:text-mintGreen font-semibold transition duration-200 ease-in-out">Aviso Legal</a></li>
      </ul>
      <p class="text-sm mt-4">© 2024 additiveAtlas.cat. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
