<x-guest-layout>
            <form method="POST" action="{{ route('article.store') }}" class="bg-white shadow-md p-5">
                @csrf
                <div class="mb-3">
                    <label class="text-gray-700" for="username">Title</label>
                    <input value="{{old('title')}}" name="title" id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md 0 focus:ring-indigo-200 focus:ring-opacity-40  focus:outline-none focus:ring">
                    @error('title')
                        <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="text-gray-700" for="username">Content</label>
                    <textarea name="body"  cols="5" rows="5" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-md 0 focus:ring-indigo-200 focus:ring-opacity-40  focus:outline-none focus:ring">{{old('body')}}</textarea>
                    @error('body')
                        <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <select name="category_id" class="block w-full text-black px-4 py-2 mt-2 bg-gray-50 border border-gray-300 rounded-md 0 focus:ring-indigo-200 focus:ring-opacity-40  focus:outline-none focus:ring">
                       @foreach ($categories as $category)
                       <option value="{{$category['id']}}">{{$category['name']}}</option>
                       @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-400">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="bg-black px-3 py-1 text-white rounded-md shadow-xl">
                    Create
                </button>
            </form>

</x-guest-layout>
