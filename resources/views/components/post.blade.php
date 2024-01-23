@props(['post'=>$post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold"> {{ $post->user->name }} </a> <span
        class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <p class="mb-2"> {{ $post->body }}</p>

    <div class="flex items-center">
        @auth
            @if(!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" class="mr-1" method="post">
                    @csrf
                    <button type="submit" class="text-blue-700">Like </button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" class="mr-1" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-700">Unlike </button>
                </form>
            @endif
        @endauth
        @if($post->likes->count())
            <span>{{ $post->likes->count() }} {{ Str::plural('Like', $post->likes->count()) }}</span>
        @endif
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-700 ml-1">Delete</button>
            </form>
        @endcan
    </div>
</div>
