<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h2 class="text-lg font-bold">To Do List</h2>
          @foreach ($todos as $todo)
            <div class="flex my-1 {{ $loop->last ? '' : 'border-b' }} todos-center">
              <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="post" class="flex-1 flex">
                @csrf
                @method('PUT')
                <label for="done-{{ $todo->id }}" class="inline-flex todos-center flex-1 py-3" x-data="{}">
                  <input type="checkbox" id="done-{{ $todo->id }}"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="done-{{ $todo->id }}" {{ $todo->checked ? 'checked' : '' }}
                    onchange="event.preventDefault();this.closest('form').submit();">
                  <span class="ml-2 text-gray-600">{{ $todo->title }}</span>
                </label>
              </form>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
