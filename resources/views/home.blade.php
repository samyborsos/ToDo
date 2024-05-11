<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>


    @guest
        <p>Please <a href="/login">login</a> for more information</p>
        <p>Please <a href="/register">register</a> for more information</p>
    @endguest

</x-layout>
