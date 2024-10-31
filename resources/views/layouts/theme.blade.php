<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>additiveAtlas.cat</title>
  <script src="https://cdn.tailwindcss.com"></script>
@vite('resources/css/app.css')
</head>
<body class="bg-lightGray text-petroleumBlue font-sans">

  <!-- Cabecera -->
  <header class="bg-mintGreen p-4 flex justify-between items-center">
    <!-- Logo -->
    <div class="text-white font-bold text-2xl">additiveAtlas.cat</div>

    <!-- Menú -->
    <nav class="space-x-4">
      <a href="#" class="text-white hover:text-lightGray">Home</a>
      <a href="#" class="text-white hover:text-lightGray">About</a>
      <a href="#" class="text-white hover:text-lightGray">Contact</a>
    </nav>

    <!-- Buscador -->
    <div class="flex items-center">
      <input
        type="text"
        placeholder="Search additives..."
        class="p-2 rounded-l bg-white text-petroleumBlue focus:outline-none"
      />
      <button class="bg-coralOrange p-2 rounded-r text-white hover:bg-petroleumBlue">
        Search
      </button>
    </div>
  </header>

  <!-- Cuerpo Principal -->
  <main class="container mx-auto p-8">
    <!-- Columna de Contenido -->
    <section>
      <h1 class="text-3xl font-bold text-petroleumBlue">Content Title</h1>
      <p class="mt-4 text-lg">
        Welcome to additiveAtlas.cat, your comprehensive guide to food additives. Here, you'll find detailed information about each additive, their uses, and potential impacts.
      </p>
      <!-- Más contenido aquí -->
    </section>

    <!-- Interlinking -->
    <section class="bg-white p-6 rounded shadow mt-8">
      <h2 class="text-2xl font-bold text-mintGreen mb-4">Explore More</h2>
      <ul class="space-y-2">
        <li><a href="#" class="text-coralOrange hover:text-petroleumBlue">Additive Groups</a></li>
        <li><a href="#" class="text-coralOrange hover:text-petroleumBlue">Popular Additives</a></li>
        <li><a href="#" class="text-coralOrange hover:text-petroleumBlue">Legislation Updates</a></li>
      </ul>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-petroleumBlue p-4 text-center text-white">
    <ul class="flex justify-center space-x-4">
      <li><a href="#" class="hover:text-mintGreen">Política de Privacidad</a></li>
      <li><a href="#" class="hover:text-mintGreen">Aviso Legal</a></li>
    </ul>
    <p class="mt-2">© 2024 additiveAtlas.cat. All rights reserved.</p>
  </footer>
</body>
</html>
