<a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-left text-sm leading-5 text-blue-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out flex items-center']) }}>
    <i class="fas fa-sign-out-alt mr-2"></i> {{ $slot }}
</a>
