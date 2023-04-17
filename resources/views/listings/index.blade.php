<x-layout>
    @include('partials._hero')
    @include('partials._search')

    @if ($listings->isEmpty())
        <h3 class="text-lg opacity-40 mt-10 text-center">No data found</h3>
    @else
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        </div>
    @endif

    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>
</x-layout>
