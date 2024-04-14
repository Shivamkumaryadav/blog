@props(['active', 'href'])

@php
$class = $active ? 'w-full text-center  px-3 py-2  bg-gradient-to-r from-[#F8586D] to-[#EB287D] font-semibold rounded-lg hover:cursor-pointer text-white' :
'font-semibold w-full px-3 text-center py-2 text-black bg-gray-200 rounded-lg  hover:bg-gradient-to-r from-[#F8586D] to-[#EB287D] hover:rounded-lg hover:text-white hover:cursor-pointer';
@endphp
<a  href="{{ $href }}" class="{{ $class }}">
    {{ $slot }}
</a>
