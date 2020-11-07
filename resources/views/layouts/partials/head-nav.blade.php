<nav class="w-1/3 mx-auto text-white text-center">
    @auth
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Genres</a> | 
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Artiesten</a> | 
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Albums</a> |
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Nummers</a>
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit" class="hover:text-gray-600 hover:underline cursor-pointer ml-6">Logout</button>
    </form>
    @else
    <a href="{{ url('/login') }}" class="hover:text-gray-600 hover:underline curosr-pointer">login</a>
    @endauth
</nav>