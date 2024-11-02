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
    <form action="{{ route('search') }}" method="GET" class="flex items-center">
      <input
        type="text"
        name="query"
        placeholder="Search additives..."
        class="p-2 rounded-l bg-white text-petroleumBlue focus:outline-none"
        required
      />
      <button type="submit" class="bg-coralOrange p-2 rounded-r text-white hover:bg-petroleumBlue">
        Search
      </button>
    </form>
  </header>