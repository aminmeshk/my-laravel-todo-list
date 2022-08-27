@props(['todo'])

<div
  {{ $attributes->merge(['class' => 'flex border-b items-center rounded hover:bg-gray-100 transition ease-in-out duration-300']) }}>
  <a href="{{ route('todo.show', ['todo' => $todo->id]) }}" class="inline-flex items-center flex-1 py-3">
    <span class="ml-2 text-gray-600">{{ $todo->title }}</span>
  </a>
</div>
