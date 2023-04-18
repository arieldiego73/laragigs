@props(['listing'])

<x-card class="p-6">
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}" alt="{{ $listing->company }} logo" />
        <div class="relative w-full">
            <h3 class="text-2xl">
                <a href="/listing/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

            {{-- TAGS --}}
            <x-listing-tags :tagsCsv="$listing->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
            <a href="/listing/{{$listing->id}}" class="absolute bottom-0 right-0 bg-sky-600 text-white px-5 py-1 rounded hover:bg-black">
                Explore
            </a>
        </div>
    </div>
</x-card>