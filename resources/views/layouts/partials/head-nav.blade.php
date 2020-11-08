<nav class="w-2/3 mx-auto text-white text-center inline-block">
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Genres</a> | 
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Artiesten</a> | 
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Albums</a> |
    <a class="hover:text-gray-600 cursor-pointer hover:underline">Nummers</a>
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit" class="hover:text-gray-600 hover:underline cursor-pointer ml-6">Logout</button>
    </form>
    @role('deejay')
        <a href="{{ url('/deejay') }}">Deejays Only</a>
    @endrole

    @role('manager')
        <a href="{{ url('/admin') }}">Managers Only</a>
    @endrole

    @role('overlord')
        Overlord Only
    @endrole
</nav>