<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('notes.index') ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            @if(request()->routeIs('notes.index'))
            <a href="{{ route('notes.create') }}" class="btn-link btn-lg">+ New Note</a>
             @endif
          @forelse ($notes as $note)

          <a
          @if(request()->routeIs('notes.index'))
             href= "{{ route('notes.show', $note) }}"
             @else
             href="{{ route('trashed.show', $note) }}"
             @endif
             ><div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-2xl">
                    {{ $note->title }}
                </h2>
                  <h5 >
                      Posted By: {{ $note->user->name }}
                  </h5>
                <p class="mt-2">
                    {{ Str::limit($note->text, 100) }}
                </p>
                <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
              </div>
            </a>
              @empty
              @if(request()->routeIs('notes.index'))
              <br>
              <p>You have no notes yet...</p>
              @else
              <p>You have no Trashed notes...</p>
              @endif
          @endforelse

          {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
