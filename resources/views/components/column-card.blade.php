@props(['judul', 'labels', 'value'])

<div class="bg-gray-50 shadow-md p-4 size-full">
    <div class="w-full pl-2 pb-6">
        <span class="text-2xl text-teal-600 font-medium">{{ $judul }}</span>
    </div>
    <x-column-chart :labels="$labels" :value="$value"/>
</div>
