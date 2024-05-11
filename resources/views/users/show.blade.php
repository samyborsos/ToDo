<x-layout>

    <x-slot:heading>
        Profile
    </x-slot:heading>
    <div class="space-y-4">

        <div class="space-y-4">
{{--             <img src="{{ str_starts_with($user->image_url, 'http') ? $user->image_url : url('') . '/storage/' . $user->image_url}}" alt=" {{$user->title}}" width="100px">
 --}}
                <x-box>

                    <div class="space-y-4">


                        <x-form-label>Name</x-form-label>
                        <x-box>{{$user['name']}}</x-box>
                        <x-form-label>Email</x-form-label>
                        <x-box>{{$user['email']}}</x-box>
                        <x-form-label>Password</x-form-label>
                        <x-box>Hidden</x-box>
                        <x-form-label>Admin?</x-form-label>
                        <x-box>{{$user['admin']}}</x-box>
                    </div>
                </x-box>
        </div>

      {{--   {{dump(Auth::user()->id == $user->id || Auth::user()->admin)}} --}}

        <div>
            @can('edit-user', $user)
                <x-button href="/users/{{$user->id}}/edit">Edit</x-button>
            @endcan
        </div>


        <hr>

        {{-- <div class="space-y-4 align-center">
            <h1>Comments:</h1>
            @foreach ($comments as $comment)
            <div class="space-y-4 block px-4 py-6 border-l border-gray-500 rounded-lg">
                <p class="text-blue-500">{{$comment->user->name}}</p>
                <p>{{$comment['content']}}</p>
                <img class="w-24" src="{{$comment->image_url}}" alt="comment-picture" >
                <div class="flex justify-end">
                    @auth
                        @if ($comment->user_id == Auth::user()->id || Auth::user()->admin)
                            <x-button href="/comments/{{$comment->id}}/edit">Edit Comment</x-button>
                        @endif
                    @endauth
                </div>
            </div>
            @endforeach

            <div>
                {{$comments->links()}}
            </div>

            <div>
                @auth
                    <x-button href="/users/{{$user->id}}/comments/create">Add Comment</x-button>
                @endauth
            </div>

        </div> --}}

    </div>

</x-layout>
