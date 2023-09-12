@props(['checked' => false])

@php
    $inputClass = 'shadow-md border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md';
    if ($readonly) {
        $inputClass .= ' bg-gray-200 text-gray-500';
    }
@endphp

@if ($type === 'textarea')
    <textarea wire:model.blur="{{ $model }}" type="{{ $type }}" {{ $attributes->except('type')->merge(['class' => $inputClass, 'readonly' => $readonly]) }}>
        {{ $slot }}
    </textarea>
@elseif ($type === 'radio')
    <input wire:model.blur="{{ $model }}" type="{{ $type }}" {{ $attributes->merge(['class' => $inputClass, 'type' => 'radio', 'readonly' => $readonly, 'checked' => $checked]) }}>
@else
    <input wire:model.blur="{{ $model }}" type="{{ $type }}" {{ $attributes->merge(['class' => $inputClass, 'type' => 'text', 'readonly' => $readonly]) }}>
@endif
