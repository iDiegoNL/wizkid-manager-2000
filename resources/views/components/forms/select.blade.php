@props([
    'id',
    'label' => '',
])

<div>
    <x-forms.label :id="$id" :label="$label" />
    <select {!! $attributes->merge(['id' => $id, 'class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) !!}>
        {{ $slot }}
    </select>
</div>
