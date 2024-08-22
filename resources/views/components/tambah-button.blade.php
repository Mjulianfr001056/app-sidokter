@props(['route'])

<button onclick="window.location.href='{{ $route }}'"
        class="flex items-center justify-center bg-green-600 text-gray-50 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 rounded-md w-full max-w-28 py-2 text-sm font-semibold">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>
    Tambah
</button>
