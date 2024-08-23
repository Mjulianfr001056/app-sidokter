@props(['id', 'route'])

<a href="{{ route($route, $id) }}" class="w-16 inline-flex items-center py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
    Delete
</a>
