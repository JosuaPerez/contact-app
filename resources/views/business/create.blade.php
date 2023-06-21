<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('business.index') }}" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="font-semibold pb-5">Add new business</h3>

                    <form action="{{ route('business.store') }}" method="POST">
                        @csrf

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p class="text-sm text-red-500">{{ $error }}</p>
                            @endforeach
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="firstname">Business Name</label>
                                <input
                                    class="block w-full"
                                    type="text"
                                    name="business_name"
                                    id="business_name"
                                    value="{{old('business_name')}}"
                                >
                            </span>

                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="email">Contact Email</label>
                                <input
                                    class="block w-full"
                                    type="email"
                                    name="contact_email"
                                    id="contact_email"
                                    value="{{old('contact_email')}}"
                                >
                            </span>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('business.index') }}" class="">Cancel</a>

                            <button class="bg-indigo-50 py-2 px-3 rounded-full" type="submit">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
