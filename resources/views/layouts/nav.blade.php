<header class="bg-gradient-to-r from-green-400 to-green-600 shadow-lg p-4 flex justify-between items-center sticky top-0 z-50">
  <!-- Logo -->
  <div class="text-white font-extrabold text-2xl tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-lightGray transition duration-200 ease-in-out">
          additiveAtlas.cat
      </a>
  </div>

  <!-- Menú de escritorio -->
  <nav class="hidden md:flex space-x-6 font-semibold">
    <a href="{{ route('home') }}" class="text-white hover:text-lightGray transition duration-200 ease-in-out">Home</a>
    <a href="{{ route('about') }}" class="text-white hover:text-lightGray transition duration-200 ease-in-out">About</a>
    <a href="#" class="text-white hover:text-lightGray transition duration-200 ease-in-out">Contact</a>
  </nav>

  <!-- Botón de menú móvil -->
  <div class="md:hidden">
    <button id="menu-btn" class="text-white focus:outline-none">
      <!-- Icono de menú -->
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </div>

  <!-- Menú móvil -->
  <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold space-y-4 p-4">
    <a href="{{ route('home') }}" class="block hover:text-lightGray transition duration-200 ease-in-out">Home</a>
    <a href="{{ route('about') }}" class="block hover:text-lightGray transition duration-200 ease-in-out">About</a>
    <a href="#" class="block hover:text-lightGray transition duration-200 ease-in-out">Contact</a>
  </div>

  <!-- Buscador -->
  <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center bg-white rounded-full shadow-lg overflow-hidden">
    <div class="flex items-center overflow-hidden rounded-full w-full">
      <input
          type="text"
          name="query"
          placeholder="Search additives..."
          class="p-2 pl-4 w-full bg-transparent text-petroleumBlue focus:outline-none"
          required
      />
      <button type="submit" class="bg-coralOrange px-4 py-2 text-white font-bold hover:bg-petroleumBlue transition duration-200 ease-in-out">
          Search
      </button>
    </div>
  </form>

  <!-- Selector de idioma -->
  <div class="language-selector hidden md:block">
    <a href="{{ route('set.language', 'en') }}" class="text-sm {{ session('locale')==='en' ? 'font-bold' : '' }}">English</a> |
    <a href="{{ route('set.language', 'es') }}" class="text-sm {{ session('locale')==='es' ? 'font-bold' : '' }}">Español</a> |
    <a href="{{ route('set.language', 'fr') }}" class="text-sm {{ session('locale')==='fr' ? 'font-bold' : '' }}">Français</a>
  </div>
</header>

<!-- Buscador, visible tanto en móvil como en escritorio -->
<div class="flex justify-center mt-4 px-4">
  <form action="{{ route('search') }}" method="GET" class="flex items-center bg-white rounded-full shadow-lg overflow-hidden w-full md:w-1/2">
    <input
        type="text"
        name="query"
        placeholder="Search additives..."
        class="p-2 pl-4 w-full bg-transparent text-petroleumBlue focus:outline-none"
        required
    />
    <button type="submit" class="bg-coralOrange px-4 py-2 text-white font-bold hover:bg-petroleumBlue transition duration-200 ease-in-out">
        Search
    </button>
  </form>
</div>

<script>
  document.getElementById('menu-btn').addEventListener('click', function () {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  });
</script>
