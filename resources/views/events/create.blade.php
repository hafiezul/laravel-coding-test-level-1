@extends('layouts.app')

@section('content')
<div class="sm:px-6 w-full">
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Creating Event</p>
        </div>
    </div>
    <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{-- <li>{{ $error }}</li> --}}
                        <button  class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">{{ $error }}</button>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Name
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="name"
                    name="name"
                    type="text"
                />
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="slug">
                    Slug
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="slug"
                    name="slug"
                    type="text"
                />
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="startAt">
                    Start Date
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="startAt"
                    name="startAt"
                    type="datetime-local"
                    step="1"
                />
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="endAt">
                    End Date
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="endAt"
                    name="endAt"
                    type="datetime-local"
                    step="1"
                />
            </div>
            <div class="mb-6 text-center">
                <button type="submit" class="w-full py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">Create</button>
            </div>
        </form>
    </div>
@endsection