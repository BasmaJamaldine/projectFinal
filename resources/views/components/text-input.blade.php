@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#f9c365]  focus:border-[#f9c365]  focus:ring-[#f9c465]  rounded-md shadow-sm']) }}>
