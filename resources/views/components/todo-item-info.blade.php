@props(['icon' => null, 'title' => ''])

<div {{ $attributes->merge(['class' => 'flex items-center space-x-1']) }}>
  <x-icon :name="$icon" class="text-base" />
  <p class="text-sm">{{ $title }}</p>
</div>
