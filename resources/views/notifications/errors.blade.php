<div class="flex flex-warp w-full bg-red-200 text-red-600 mb-6 px-3 py-4 border border-red-300">
    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <div class="flex flex-col flex-wrap">
        @foreach (session('errors')->all() as $error)
        <span>{{ $error }}</span>        
        @endforeach
    </div>
    
</div>