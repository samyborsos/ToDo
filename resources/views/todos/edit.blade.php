<x-layout>
    <x-slot:heading>
        Edit todo: {{ $todo->title}}
    </x-slot:heading>

    <form method="POST" action="/todos/{{$todo->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="title" id="title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->title}}" required>
                            </div>
                            @error('title')
                            <p class="text-xs text-red-500 font-semibold mt-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="deadline" class="block text-sm font-medium leading-6 text-gray-900">deadline</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="deadline" id="deadline"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->deadline}}" required>
                            </div>
                            @error('deadline')
                            <p class="text-xs text-red-500 font-semibold mt-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="done" class="block text-sm font-medium leading-6 text-gray-900">done</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="done" id="done"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->done}}" required>
                            </div>
                            @error('done')
                            <p class="text-xs text-red-500 font-semibold mt-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">category</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="category" id="category"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->category}}" required>
                            </div>
                            @error('category')
                            <p class="text-xs text-red-500 font-semibold mt-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="image_url" class="block text-sm font-medium leading-6 text-gray-900">image_url</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <img src="{{ str_starts_with($todo->image_url, 'http') ? $todo->image_url : '/storage/' . $todo->image_url}}" alt="sf" style="width: 100px">

                                <input type="file" name="image_url" id="image_url"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->image_url}}">
                            </div>
                            @error('image_url')
                            <p class="text-xs text-red-500 font-semibold mt-2">{{$message}} </p>
                            @enderror
                        </div>
                    </div>





                </div>
            </div>




        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">
                    Delete
                </button>
            </div>

            <div class="flex items-center gap-x-6">
                <a href="/todos/{{$todo->id}}" type="button"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                <div>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="/todos/{{$todo->id}}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
