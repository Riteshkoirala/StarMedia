<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $note->trashed() ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <x-alert-success>
                {{ session('success') }}
              </x-alert-success>
            <div class="flex">
                @if(!$note->trashed())
                <p class="opacity-70">
                    <strong>Created: </strong>{{ $note->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-8">
                    <strong>Updated: </strong>{{ $note->created_at->diffForHumans() }}
                </p>

                <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto">EDIT NOTE</a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure u wish to move this note to trash?')">MOVE TO TRASH</button>
                </form>
@else
                <p class="opacity-70 ml-8">
                    <strong>Deleted: </strong>{{ $note->deleted_at->diffForHumans() }}
                </p>
                <form action="{{ route('trashed.update', $note) }}" method="POST" class="ml-auto">
                @method('put')
                @csrf
                <button type="submit" class="btn-link ml-auto">RESTORE NOTE</button>
                </form>
                <form action="{{ route('trashed.destroy', $note) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure u wish to permanentaly delete this note?')">PERMANENT DELETE</button>
                </form>
                @endif
            </div>
          <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-4xl">
                    {{ $note->title }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap">{{ $note->text }}</p>
              </div>
            </a>
        </div>
    </div>
</x-app-layout>