@props(['class'])

<button
class="bg-purple-600 text-white active:bg-purple-700 font-bold px-6 py-3 rounded-full shadow hover:shadow-lg outline-none focus:outline-none hover:bg-transparent hover:text-purple-600 hover:border-purple-600 hover:border mr-1 mb-1 ease-linear transition-all duration-150 @if ($class) {{ $class }} @endif">
    {{ $slot }}
</button>
