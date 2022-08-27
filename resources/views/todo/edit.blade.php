<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Edit To-Do Item
    </h2>
    {{ Breadcrumbs::render('todo.edit', $todo) }}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col space-y-2">
      <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-col sm:flex-row px-2 sm:px-0 self-stretch justify-end space-x-2 mb-2">
          <x-button title="Save" icon="done" />
          <x-button-link :route="route('todo.show', ['todo' => $todo])" title="Discard" icon_name="close" variant="transparent" />
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <x-input type="text" name="title" id="title" placeholder="Title" value="{{ $todo->title }}"
              class="flex-1 mt-1 block w-full text-base font-bold sm:text-lg" />
            @error('title')
              <p class="text-red-700 text-xs m-1">{{ $message }}</p>
            @enderror
            <textarea
              class="mt-2 block w-full text-sm sm:text-base rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              name="description" rows="10">{{ $todo->description }}</textarea>
            @error('description')
              <p class="text-red-700 text-xs m-1">{{ $message }}</p>
            @enderror
            {{-- </div> --}}
          </div>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
