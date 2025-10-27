<x-layout>
<div class="container">
    <h2>Muokkaa kirjanmerkkiä</h2>
    <form action="{{ route('bookmarks.update', $bookmark->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Otsikko</label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $bookmark->title) }}"
                {{-- required --}}
                spellcheck="false">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url">URL</label>
            <input
                type="url"
                name="url"
                id="url"
                value="{{ old('url', $bookmark->url) }}"
                {{-- required --}}
                spellcheck="false"
            >
            @error('url')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Päivitä kirjanmerkki</button>
        <a href="{{ route('bookmarks.index') }}" class="mx-2">Peruuta</a>
    </form>
</div>
</x-layout>
