<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Edit To-Do Item
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col space-y-2">
      <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex flex-row self-stretch justify-end space-x-2 mb-2">
          <x-button
            class="space-x-1">
            <span class="material-symbols-outlined text-xl">
              done
            </span>
            <span>
              Save
            </span>
          </x-button>
          <a href="{{ back()->getTargetUrl() }}"
            class="inline-flex items-center space-x-1 px-4 py-2 bg-transparent hover:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest active:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            <span class="material-symbols-outlined text-xl">
              close
            </span>
            <span>
              Discard
            </span>
          </a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <input type="text" name="title" id="title" placeholder="Title" value="{{ $todo->title }}"
              class="flex-1 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base font-bold sm:text-lg border-gray-300 rounded-md">
            {{-- <div class="flex my-1 items-center"> --}}
            <textarea
              class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-sm sm:text-base border-gray-300 rounded-md"
              name="description" rows="10">{{ $todo->description }}</textarea>
            {{-- </div> --}}
          </div>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
