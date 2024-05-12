<x-layout>

    <x-slot:heading>
        Stats
    </x-slot:heading>

    <x-box>
        <x-form-label>All todos</x-form-label>
        <x-form-input value="{{$todo_all_count}}"></x-form-input>

        <x-form-label>Done</x-form-label>
        <x-form-input value="{{$todo_done_count}}"></x-form-input>

        <x-form-label>Not Done</x-form-label>
        <x-form-input value="{{$todo_not_done_count}}"></x-form-input>

        <x-form-label>Done percentage</x-form-label>
        <x-form-input value="{{$todo_done_percent}}%"></x-form-input>

        <x-form-label>All todos</x-form-label>
        <x-form-input value="{{$todo_all_count}}"></x-form-input>
    </x-box>

</x-layout>
