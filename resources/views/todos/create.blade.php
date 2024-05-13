<x-layout>
    <x-slot:heading>
        Create todo
    </x-slot:heading>

    <form method="POST" action="/todos" enctype="multipart/form-data">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New todo</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">

                            <x-form-input name="title" id="title" placeholder="todo title example" required=""></x-form-input>

                            <x-form-error name="title"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="deadline">deadline</x-form-label>
                        <div class="mt-2">

                            <x-form-input type="date" name="deadline" id="deadline" placeholder="todo deadline example" required=""></x-form-input>

                            <x-form-error name="deadline"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="category">category</x-form-label>
                        <div class="mt-2">

                            <x-form-input name="category" id="category" placeholder="todo category example" required=""></x-form-input>

                            <x-form-error name="category"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="image_url">image_url</x-form-label>
                        <div class="mt-2">

                            <x-form-input type="file" name="image_url" id="image_url" placeholder="todo image_url example" required=""></x-form-input>

                            <x-form-error name="image_url"/>
                        </div>
                    </x-form-field>

                </div>
            </div>




        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>


</x-layout>
