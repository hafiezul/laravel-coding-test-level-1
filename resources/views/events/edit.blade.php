@extends('layouts.app')

@section('content')
<div class="sm:px-6 w-full">
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Editing Event {{ $event->slug }}</p>
        </div>
    </div>
    <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
        <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                    Name
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="name"
                    name="name"
                    type="text"
                    placeholder="{{ $event->name }}"
                    value="{{ $event->name }}"
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
                    placeholder="{{ $event->slug }}"
                    value="{{ $event->slug }}"
                    disabled
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
                    placeholder="{{ $event->startAt }}"
                    value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($event->startAt))->format('Y-m-d\TH:i:s') }}"
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
                    placeholder="{{ $event->endAt }}"
                    value="{{ \Carbon\Carbon::createFromTimestamp(strtotime($event->endAt))->format('Y-m-d\TH:i:s') }}"
                    step="1"
                />
            </div>
            <div class="mb-6 text-center">
                <button type="submit" class="w-full py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">Update</button>
            </div>
        </form>
    </div>
@endsection