{{-- @props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1  text-lg font-medium leading-5 bg-[#fbd479]  transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1  text-lg  font-medium leading-5  transition duration-150 ease-in-out';
@endphp --}}

<a {{ $attributes }}>
    {{ $slot }}
</a>
