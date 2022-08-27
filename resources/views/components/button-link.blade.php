@props(['title', 'route', 'icon_name' => null, 'variant' => 'primary'])

@php
$primary_classes = 'bg-gray-800 text-white hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900';
$transparent_classes = 'bg-transparent hover:bg-gray-200 text-gray-800 active:bg-gray-200 focus:bg-gray-200';
$delete_classes = 'bg-transparent hover:bg-red-100 border-0 text-red-600 active:bg-red-100 focus:bg-red-100 ring-red-200';
$chosen = $variant == 'primary' ? $primary_classes : ($variant == 'transparent' ? $transparent_classes : ($variant === 'delete' ? $delete_classes : ''));
@endphp

<a href="{{ $route }}"
  {{ $attributes->merge(['class' => 'inline-flex space-x-1 justify-center items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ' . $chosen]) }}>
  @if ($icon_name)
    <x-icon :name="$icon_name" />
  @endif
  <span>
    {{ $title }}
  </span>
</a>
