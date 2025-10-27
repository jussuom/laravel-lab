<x-layout>
    @auth
        {{ __('Welcome back') }}, {{ auth()->user()->name }}!
        <hr class="my-4">
        <h2 class="text-3xl mb-4">{{ __('Your Bookmarks') }}</h2>
        @if ($categories->isEmpty())
            <p>{{ __("You don't have any bookmark categories yet.") }}</p>
            <hr class="my-4">
            <p>
                <a href="{{ route('categories.create') }}" class="button">{{ __('Add new bookmark category') }}</a>
            </p>
        @endif
        @foreach ($categories as $category)
            <x-category :category="$category" />
        @endforeach
    @endauth
</x-layout>

<x-confirm-deletion-dialog />
