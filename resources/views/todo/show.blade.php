<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      To-Do Item
    </h2>
    {{ Breadcrumbs::render('todo.show', $todo) }}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col space-y-2">
      <div class="flex flex-col sm:flex-row px-2 sm:px-0 self-stretch justify-end space-x-2 mb-2">
        <form action="{{ route('todo.done', ['todo' => $todo->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <x-button class="w-full" :icon="$todo->done ? 'block' : 'done'" :title="'Mark As ' . ($todo->done ? 'To-Do' : 'Done')" />
          <input type="hidden" name="done" value="{{ $todo->done ? '0' : '1' }}" />
        </form>
        <x-button-link :route="route('todo.edit', ['todo' => $todo])" variant="transparent" icon_name="edit" title="edit" />
        <form action="{{ route('todo.destroy', ['todo' => $todo]) }}" method="POST">
          @csrf
          @method('DELETE')
          <x-button class="w-full" icon="delete" title="Delete" variant="delete" />
        </form>
      </div>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
        @if ($todo->done)
          <x-done-badge />
        @endif
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex space-x-2">
            <h2 class="text-lg font-bold flex-1">{{ $todo->title }}</h2>

          </div>
          <div class="flex flex-col my-1 space-y-2">

            <p>{{ $todo->description }}</p>

            @if ($todo->done)
              <x-todo-item-info class="text-green-700" icon="done" :title="'Done ' . (new Carbon\Carbon($todo->done_at))->longRelativeToNowDiffForHumans()" />
            @endif
            <x-todo-item-info icon="edit" :title="'Last modified ' . $todo->updated_at->longRelativeToNowDiffForHumans()" />
            <x-todo-item-info icon="schedule" :title="'Created ' . $todo->created_at->longRelativeToNowDiffForHumans()" />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
