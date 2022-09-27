<x-guest-layout>
    <div class="bg-white shadow-md mb-3  p-5 rounded-md space-y-3">
        <h1 class="text-xl font-bold">{{ $article['title'] }}</h1>
        <div class="flex items-center text-sm text-gray-400 space-x-3">
            <h6 class=" flex items-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ $article['updated_at']->diffForHumans() }}</span>
            </h6>
            <div>
                <span>Category</span>
                <span>{{ $article->category->name }}</span>
            </div>
        </div>


        <p class="">
            {{ $article['body'] }}
        </p>
        <form action="{{ route('article.delete', $article['id']) }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-3  py-1 rounded-md text-white shadow">
                Delete
            </button>
        </form>
    </div>

    <div class="rounded-md shadow-md">
        <h3 class="bg-indigo-500 text-white  p-2">Comments({{ count($article->comments) }})</h3>
        @foreach ($article->comments as $comment)
            <div class="items-center justify-between flex bg-white p-3 border-b border-gray-400">
                <div class="  ">
                    {{ $comment->content }}
                    <div class="text-gray-400 mt-3">By <strong>{{$comment->user->name}}</strong></div>
                    <h6 class=" flex items-center text-gray-400 mt-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ $comment['updated_at']->diffForHumans() }}</span>
                    </h6>
                </div>
                <a href="{{ route('comment.delete', $comment['id']) }}" class="bg-red-500 hover:bg-red-600 px-3  py-1 rounded-md text-white shadow">Delete</a>
            </div>
        @endforeach
    </div>

    @auth
    <div class="mt-3">
        <form method="POST" action="{{ route('comment.add') }}">
            @csrf
            <input value="{{$article['id']}}" name="article_id" type="text" hidden>
            <div class="mb-3">
                <textarea name="content"  cols="5" rows="3" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md 0 focus:ring-indigo-200 focus:ring-opacity-40  focus:outline-none focus:ring" placeholder="Add Comment">{{old('content')}}</textarea>
                @error('content')
                    <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="bg-black px-3 py-1 text-white rounded-md shadow-xl">
                Add Comment
            </button>
        </form>
    </div>
    @endauth

</x-guest-layout>
