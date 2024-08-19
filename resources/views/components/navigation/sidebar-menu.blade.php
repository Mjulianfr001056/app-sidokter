@props(['name', 'icon'])

@php
    use App\Helpers\SvgIcon;
@endphp

<button
    type="button"
    class="flex flex-row items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg group hover:bg-teal-600"
    aria-controls="dropdown-example"
    data-collapse-toggle="dropdown-example"
>
    {!! $icon !!}
    <span class="flex-1 ms-3 text-left whitespace-nowrap font-normal">{{ $name ?? 'No name passed' }}</span>
    {!! SvgIcon::chevronDown() !!}
</button>
