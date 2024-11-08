<header class="bg-gradient-to-r from-green-400 to-green-600 shadow-lg p-4 flex justify-between items-center sticky top-0 z-50">
  <!-- Logo -->
  <div class="text-white font-extrabold text-2xl tracking-wider">
      <a href="{{ route('home') }}" class="hover:text-lightGray transition duration-200 ease-in-out">
          additiveAtlas.cat
      </a>
  </div>

  <!-- Menú -->
  <nav class="space-x-6 font-semibold">
    <a href="{{ route('home') }}" class="text-white hover:text-lightGray transition duration-200 ease-in-out">Home</a>
    <a href="{{ route('about') }}" class="text-white hover:text-lightGray transition duration-200 ease-in-out">About</a>
    <a href="#" class="text-white hover:text-lightGray transition duration-200 ease-in-out">Contact</a>
  </nav>

<!-- Buscador -->
<form action="{{ route('search') }}" method="GET" class="flex items-center bg-white rounded-full shadow-lg overflow-hidden">
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
<div class="language-selector">
  <a href="{{ route('set.language', 'en') }}" class="text-sm {{ App::isLocale('en') ? 'font-bold' : '' }}">English</a> |
  <a href="{{ route('set.language', 'es') }}" class="text-sm {{ App::isLocale('es') ? 'font-bold' : '' }}">Español</a> |
  <a href="{{ route('set.language', 'fr') }}" class="text-sm {{ App::isLocale('fr') ? 'font-bold' : '' }}">Français</a>
</div>
</header>
