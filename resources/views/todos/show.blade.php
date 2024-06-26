<x-layout>

    <x-slot:heading>
        Todo
    </x-slot:heading>
    <div class="space-y-4">

        <div class="space-y-4">
{{--             <img src="{{ str_starts_with($todo->image_url, 'http') ? $todo->image_url : url('') . '/storage/' . $todo->image_url}}" alt=" {{$todo->title}}" width="100px">
 --}}
        </div>

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
                                    placeholder="Shift Leader" value="{{$todo->title}}" disabled>
                            </div>

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="deadline" class="block text-sm font-medium leading-6 text-gray-900">deadline</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="deadline" id="deadline"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->deadline}}" disabled>
                            </div>

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="done" class="block text-sm font-medium leading-6 text-gray-900">done</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="done" id="done"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->done}}" disabled>
                            </div>

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">category</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="category" id="category"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="{{$todo->category}}" disabled>
                            </div>

                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="image_url" class="block text-sm font-medium leading-6 text-gray-900">image_url</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <img src="{{ str_starts_with($todo->image_url, 'http') ? $todo->image_url : '/storage/' . $todo->image_url}}" alt="{{$todo->title}}" style="width: 100px">
                                <input type="file" name="image_url" id="image_url"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Shift Leader" value="" disabled>
                            </div>

                        </div>
                    </div>





                </div>
            </div>




        </div>

        <div>
            @auth
                @if ($todo->user_id == Auth::user()->id || Auth::user()->admin)
                    <x-button href="/todos/{{$todo->id}}/edit">Edit</x-button>
                @endif
            @endauth
        </div>


        <hr>

        <div class="space-y-4 align-center">
            <h1>Comments:</h1>
            @foreach ($comments as $comment)
            <div class="space-y-4 block px-4 py-6 border-l border-gray-500 rounded-lg">
                {{-- <p class="text-blue-500">{{$comment->user->name}}</p> --}}
                <p>{{$comment['content']}}</p>
                {{-- <img class="w-24" src="{{$comment->image_url}}" alt="comment-picture" > --}}
{{--                 <div class="flex justify-end">
                    @auth
                        @if ($comment->user_id == Auth::user()->id || Auth::user()->admin)
                            <x-button href="/comments/{{$comment->id}}/edit">Edit Comment</x-button>
                        @endif
                    @endauth
                </div> --}}
            </div>
            @endforeach

            <form method="POST" action="/todos/{{$todo->id}}/comments" enctype="multipart/form-data">
                @csrf

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <x-form-field>
                                <div class="mt-2">

                                    <x-form-input name="content" id="content" placeholder="add comment" required=""></x-form-input>

                                    <x-form-error name="content"/>
                                </div>
                            </x-form-field>

                        </div>
                    </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">

                    <x-form-button>Add comment</x-form-button>
                </div>
            </form>

        </div>

    </div>

</x-layout>
