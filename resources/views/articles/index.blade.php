<x-guest-layout>
    @if(session('success'))
    <div class="flex w-full mb-3 mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
        <div class="flex items-center justify-center w-12 bg-emerald-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-emerald-500 dark:text-emerald-400">Success</span>
                <p class="text-sm text-gray-600 dark:text-gray-200">{{session('success')}}</p>
            </div>
        </div>
    </div>
    @endif
    @if(session('delete'))
    <div class="flex w-full mb-3 mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center justify-center w-12 bg-red-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-red-500 dark:text-red-400">Delete</span>
                <p class="text-sm text-gray-600 dark:text-gray-200">{{session('delete')}}</p>
            </div>
        </div>
    </div>
    @endif
    <form action="{{ route('article.index') }}" class="mb-3" method="GET">
        <x-input type="text" placeholder="Search" name="search"></x-input>
    </form>
    <div class="mb-3">
        @foreach (\App\Models\Category::get() as $category)
        <a href="{{ route('article.index', ['category' => $category->name]) }}"
            class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $category->name === request()->get('category') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}"
        >{{ $category->name }}</a>
        @endforeach
        <span></span>
    </div>
  @foreach ($articles as $article)
  <div class="bg-white shadow-md mb-3  p-5 rounded-md space-y-3">
    <h1 class="text-xl font-bold">{{$article['title']}}</h1>
    <h6 class="text-sm text-gray-400 flex items-center">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>{{$article['updated_at']->diffForHumans()}}</span>
        <span
            class="inline-block ml-2 tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase {{ $article->category->name === request()->get('category') ? 'bg-indigo-500 text-white' : 'bg-white text-indigo-500' }}"
        >{{ $article->category->name }}</span>
    </h6>
    <p class="">
       {{$article['body']}}
    </p>
    <button href=""
    class="bg-indigo-500 hover:bg-indigo-600 px-3  py-1 rounded-md text-white shadow"
    >
      <a href="{{ route('article.show', $article['id'] ) }}">View Details</a>
    </button>
</div>
  @endforeach
  <div class="mt-2">
      {{$articles->withQueryString()->links()}}
  </div>
</x-guest-layout>
