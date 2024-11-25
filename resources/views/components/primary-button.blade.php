<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#f5b53d] text-[#181611]  border border-transparent rounded-md font-semibold text-md text-white dark:text-gray-800 uppercase tracking-widest hover:bg-[#] focus:bg-gray-700  active:bg-gray-900  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
