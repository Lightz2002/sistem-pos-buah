@php
    // Set a default value for $type if it's not set
$type = $type ?? 'submit';
@endphp

@if ($type === 'redirect')
    <a
        {{ $attributes->merge([
            'class' => 'px-2 text-center py-2 rounded-lg inline-flex items-center 
                    bg-teal-500 border border-transparent rounded-md font-semibold text-xs
                    text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700
                    active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500
                    focus:ring-offset-2 transition ease-in-out duration-150',
        ]) }}>
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes->merge([
            'type' => 'submit',
            'class' => 'inline-flex items-center px-4 py-2
            bg-teal-500 border border-transparent rounded-md font-semibold text-xs
            text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700
            active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500
            focus:ring-offset-2 transition ease-in-out duration-150',
        ]) }}>
        {{ $slot }}
    </button>
@endif

