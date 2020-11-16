<div class="block lg:hidden">
    <nav class="flex items-center bg-blue-300 p-3 flex-wrap">
      <button class="text-white p-3 hover:bg-gray-900 rounded ml-auto outline-none nav-toggler flex flex-row flex-wrap" data-target="#navigation">
        <svg class="w-6 h-6" 
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24" 
                xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span></span>
      </button>
      <div class="hidden top-navbar w-full" id="navigation">
        <div class="w-full items-start flex flex-col">
            <span class="flex font-medium text-sm text-blue-600 px-4 my-4 uppercase">Databank</span>
            <a href="{{ route('genre-home') }}"
                class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                    <svg fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </span>
                <span class="ml-3">Genres</span>
            </a>

            <a href="{{ route('artist-home') }}"
                class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                    <svg fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            class="h-6 w-6">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </span>
                <span class="ml-3">Artiesten</span>
            </a>

            <a href="{{ route('album-home') }}"
                class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                    <svg class="w-6 h-6" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </span>
                <span class="ml-3">Albums</span>
            </a>

            <a href="{{ route('song-home') }}"
                class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                <svg fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24" 
                    class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                </svg>
                </span>
                <span class="ml-3">Nummers</span>
            </a>

            @if (auth()->user()->can('manage-data'))
            <a href="#"
               class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                    <svg class="w-6 h-6" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </span>
                <span class="ml-3">Manage databank</span>
            </a>
            @endif
            @role('overlord')
            <span class="flex font-medium text-sm text-blue-600 px-4 my-4 uppercase">Overlord menu</span>

            <a href="{{ route('overlord-permission-home') }}"
                class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                    <svg class="w-6 h-6" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                </span>
                <span class="ml-3">Manage toestemmingen</span>
            </a>
        
            <a href="{{ route('overlord-role-home') }}"
               class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                    <svg class="w-6 h-6" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </span>
                <span class="ml-3">Manage rollen</span>
            </a>

            <a href="{{ route('overlord-users-home') }}"
                class="w-full px-3 py-4 text-white flex flex-row">
                <span class="text-lg text-gray-200">
                    <svg class="w-6 h-6" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </span>
                <span class="ml-3">Manage users</span>
            </a>
            @endrole
            
            <span class="flex font-medium text-sm text-blue-600 px-4 my-4 uppercase">Account</span>
            
            <form action="{{ url('/logout') }}" method="POST">
            @csrf
                <button type="submit"
                    class="flex flex-row items-center h-12 w-full px-4 text-white">
                    <span class="flex items-center justify-center text-lg text-red-400">
                        <svg fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="h-6 w-6">
                            <path d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                        </svg>
                    </span>
                    <span class="ml-3">Logout</span>
                </button>
            </form>
        </div>
      </div>
    </nav>
</div>


@push('script')
<script type="text/javascript">
    $(document).ready(function() {
        $(".nav-toggler").each(function(_, navToggler) {
        var target = $(navToggler).data("target");
            $(navToggler).on("click", function() {
                $(target).stop().animate({
                    height: "toggle"
                });
            });
        });
    });

</script>
@endpush