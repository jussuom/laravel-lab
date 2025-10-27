<x-layout>
    @auth
        {{ __('Welcome back') }}, {{ auth()->user()->name }}!
        <hr class="my-4">
        <h2 class="text-3xl mb-4">{{ __('Your Bookmarks') }}</h2>
        <hr class="my-4">
        Filter by categories:
        <form method="POST" action="{{ route('bookmarks.filter') }}" class="mb-4">
            @csrf
            <x-category-checkboxes :categories="$categories" />
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded">{{ __('Filter') }}</button>
            <a href="{{ route('bookmarks.index') }}" class="ml-2 px-4 py-2 bg-gray-600 text-white rounded">{{ __('Clear Filters') }}</a>
        </form>
        <hr class="my-4">
        @if ($bookmarks->isEmpty())
            <p>{{ __("You don't have any bookmarks yet.") }}</p>
            <hr class="my-4">
            <p>
                <a href="{{ route('bookmarks.create') }}" class="button">{{ __('Add Bookmark') }}</a>
            </p>
        @endif
        @foreach ($bookmarks as $bookmark)
            <x-bookmark :bookmark="$bookmark" />
        @endforeach
    @endauth
</x-layout>

<x-confirm-deletion-dialog />
