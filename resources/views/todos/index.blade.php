<x-layout>
    <x-slot:heading>
        Todos listings
    </x-slot:heading>





    <div class="space-y-4">

        <form method="GET" action="/todos/search">
            @csrf

            <div class="flex items-center space-x-2">
                <x-form-input name="term" placeholder="Search here" value="{{request('term')}}"></x-form-input>
                <x-form-button>Search</x-form-button>
            </div>
        </form>

            <form method="GET" action="/todos/filter">
                @csrf

                <div class="flex items-center space-x-2">
                    <x-form-button type="submit" name="filter" value="category" >Filter by Category</x-form-button>
                    <x-form-button type="submit" name="filter" value="title">Filter by Title</x-form-button>
                    <x-form-button type="submit" name="filter" value="deadline">Filter by Deadline</x-form-button>


                    <div class="relative">
                        <select name="sort_order">
                            <option value="">-- Sort By --</option>
                            <option {{request()->get('sort_order') == "asc" ? 'selected' : ''}} value="asc">Ascending</option>
                            <option {{request()->get('sort_order') == "desc" ? 'selected' : ''}} value="desc">Descending</option>
                        </select>
                    </div>
                </div>


            </form>

        {{-- <div>



        </div>

        <div>

            <form method="GET" action="/todos/filterCategory">
                @csrf

                <div>
                    <x-form-button>Filter Category ↓</x-form-button>
                </div>
            </form>



        </div>
        <form method="GET" action="/todos/filterTitle">
            @csrf

            <div>
                <x-form-button>Filter Title ↓</x-form-button>
            </div>
        </form>

        <form method="GET" action="/todos/filterDeadline">
            @csrf

            <div>
                <x-form-button>Filter Deadline ↓</x-form-button>
            </div>
        </form> --}}

        <div class="text-lg">NOT DONE</div>
        @foreach ($todos as $todo)
            @if ($todo->done == false)
                <a href="/todos/{{$todo['id']}}" class="block px-4 py-6 border border-gray-300 rounded-lg">
                    {{-- <img class="w-full"
                        src="{{ str_starts_with($todo->image_url, 'http') ? $todo->image_url : 'storage/' . $todo->image_url}}"
                        alt="{{$todo->title}}">
                    --}}
                    <div class="flex justify-around">
                        <p><img src="{{ str_starts_with($todo->image_url, 'http') ? $todo->image_url : 'storage/' . $todo->image_url}}" class="object-scale-down" style="width:100px" alt="placeholder"></p>
                        <p><strong>{{$todo['title']}}</strong></p>
                        <p class="text-gray-500">Deadline: {{$todo['deadline']}}</p>
                        <p> {{($todo['done'])? "Done" : "Not done"}} </p>
                        <p> <strong>{{$todo->category}}</strong> </p>
                    </div>
                </a>
            @endif
        @endforeach

        <div class="text-lg">DONE</div>
        @foreach ($todos as $todo)
            @if ($todo->done == true)
                <span class="line-through">
                    <a href="/todos/{{$todo['id']}}" class="block px-4 py-6 border border-gray-300 rounded-lg">
                        {{-- <img class="w-full"
                        src="{{ str_starts_with($todo->image_url, 'http') ? $todo->image_url : 'storage/' . $todo->image_url}}"
                        alt="{{$todo->title}}">
                        --}}
                        <div class="flex justify-around">
                            <p><strong>{{$todo['title']}}</strong></p>
                            <p class="text-gray-500">Done at: {{$todo['done_at']}}</p>
                            <p> {{($todo['done'])? "Done" : "Not done"}} </p>
                        </div>
                    </a>
                </span>
            @endif
        @endforeach

    </div>

</x-layout>

{{-- <div class="p-10">
    <!--Card 1-->
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="/mountain.jpg" alt="Mountain">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Mountain</div>
            <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et
                perferendis eaque, exercitationem praesentium nihil.
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
        </div>
    </div>
</div> --}}
