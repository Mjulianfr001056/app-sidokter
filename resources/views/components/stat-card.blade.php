@props(['jumlah'])

<div class="card bg-teal-600 w-full mx-4 shadow-lg rounded-t-sm">
    <div class="card-body py-2 px-4">
        <p class="card-title text-gray-50 text-center text-sm px-4 py-4">{{ $slot }}</p>
    </div>
    <div>
        <div class="flex justify-center bg-gray-50 h-20 rounded-b-md">
            <p class="text-5xl text-teal-700 font-semibold self-center pb-2">{{ $jumlah }}</p>
        </div>
    </div>
</div>
