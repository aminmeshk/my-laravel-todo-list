@props(['name'])

<span {{ $attributes->merge(['class' => 'material-symbols-outlined text-xl']) }}>
  {{ $name }}
</span>
