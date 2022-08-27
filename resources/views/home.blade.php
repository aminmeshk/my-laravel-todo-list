<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('To-Do List') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row px-2 sm:px-0 self-stretch justify-end space-x-2 mb-2">
        <x-button-link variant="primary" :route="route('todo.create')" icon_name="add" title="Add" />
      </div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
        <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
          @unless($todos->isEmpty())
            @unless($todos->where('done', false)->isEmpty())
              <h2 class="text-lg font-bold">To-Do</h2>
              @foreach ($todos->where('done', false) as $todo)
                <x-todo-item-row :todo="$todo" :class="$loop->last ? 'border-b-0' : ''" />
              @endforeach
            @endunless
            @unless($todos->where('done', true)->isEmpty())
              <h2 class="text-lg font-bold my-2">Done</h2>
              @foreach ($todos->where('done', true) as $todo)
                <x-todo-item-row :todo="$todo" :class="$loop->last ? 'border-b-0' : ''" />
              @endforeach
            @endunless
          @else
            <h2 class="text-lg font-bold text-center">Nothing to show</h2>
            <a href="{{ route('todo.create') }}"
              class="py-2 px-4 hover:bg-gray-100 transition ease-in-out duration-300 rounded self-center flex items-center space-x-1">
              <x-icon name="add" />
              <span>
                Add a To-Do item
              </span>
            </a>
          @endunless

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
