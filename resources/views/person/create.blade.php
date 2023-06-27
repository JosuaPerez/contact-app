<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('person.index') }}" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="font-semibold pb-5">Add new person</h3>

                    <form action="{{ route('person.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="firstname">First Name</label>
                                <input
                                    class="block w-full"
                                    type="text"
                                    name="firstname"
                                    id="firstname"
                                    value="{{old('firstname')}}"
                                >
                            </span>
                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="lastname">Last Name</label>
                                <input
                                    class="block w-full"
                                    type="text"
                                    name="lastname"
                                    id="lastname"
                                    value="{{old('lastname')}}"
                                >
                            </span>

                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="email">Email</label>
                                <input
                                    class="block w-full"
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{old('email')}}"
                                >
                            </span>

                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="phone">Phone</label>
                                <input
                                    class="block w-full"
                                    type="text"
                                    name="phone"
                                    id="phone"
                                    value="{{old('phone')}}"
                                >
                            </span>

                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="birthday">Birthday</label>
                                <input
                                    class="block w-full"
                                    type="date"
                                    name="birthday"
                                    id="birthday"
                                    value="{{old('birthday')}}"
                                >
                            </span>

                            <span class="sm:col-span-3">
                                <label class="py-4 block" for="business">Business</label>
                                <select class="block w-full" name="business_id" id="business_id">
                                    <option value="" selected>No Business</option>
                                    @foreach($businesses as $business)
                                        <option value="{{ $business->id }}" @selected($business->id == old('$business_id'))>
                                            {{ $business->business_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </span>
                        </div>

                        <h4 class="font-semibold pt-5">Tags</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-x-6 gap-y-6">
                            @foreach($tags as $tag)
                                <span class="sm:col-span-2">
                                    <input type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                                    <label for="tag{{ $tag->id }}">{{ $tag->tag_name }}</label>
                                </span>
                            @endforeach
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('person.index') }}" class="">Cancel</a>

                            <button class="bg-indigo-50 py-2 px-3 rounded-full" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
