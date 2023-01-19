<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('home.index') ? __('Home') : __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          @forelse ($notes as $note)
          <a href= "{{ route('home.show', $note) }}"
             ><div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <h2 class="font-bold text-2xl">
                    {{ $note->title }}
                </h2>
                <p class="mt-2">
                    {{ Str::limit($note->text, 100) }}
                </p>
                <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
              </div>
            </a>
              @empty
              <br>
              <p>Any notes has not been published yet...</p>
          @endforelse

          {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
