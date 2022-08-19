<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('To-Do List') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex flex-col sm:flex-row px-2 sm:px-0 self-stretch justify-end space-x-2 mb-2">
        <a href="{{ route('todo.create') }}"
          class="inline-flex space-x-1 justify-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
          <span class="material-symbols-outlined text-xl">
            add
          </span>
          <span>
            Add
          </span>
        </a>
      </div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h2 class="text-lg font-bold">To Do List</h2>
          @foreach ($todos as $todo)
            <div class="flex border-b last:border-b-0 items-center rounded hover:bg-gray-100 transition ease-in-out duration-300">
              {{-- <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" method="post" class="flex-1 flex"> --}}
                {{-- @csrf
                @method('PUT') --}}
                <a href="{{route('todo.show', ['todo' => $todo->id])}}" class="inline-flex items-center flex-1 py-3">
                  <span class="ml-2 text-gray-600">{{ $todo->title }}</span>
                </a>
              {{-- </form> --}}
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
