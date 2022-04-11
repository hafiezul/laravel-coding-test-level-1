@extends('layouts.app')

@section('content')
    
<!-- component -->
<div class="sm:px-6 w-full">
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Events</p>
        </div>
    </div>
    <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
        <div class="overflow-x-auto">
            <a href="{{ route('events.create') }}">
                <button class="w-full py-3 my-4 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">Create</button>
            </a>
            <table id="events" class="w-full whitespace-nowrap">
                <thead>
                    <tr class="focus:outline-none h-16 border border-gray-100 rounded">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Slug</th>
                        <th class="px-4 py-2">Start Date</th>
                        <th class="px-4 py-2">End Date</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="pl-5">
                            <div class="flex items-center">
                                <a href="{{ route('events.show', $event->id) }}">
                                    <p class="text-sm leading-none text-indigo-600 ml-2">{{ $event->name }}</p>
                                </a>
                            </div>
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $event->slug }}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $event->startAt }}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $event->endAt }}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">
                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $event->created_at->diffForHumans() }}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            <a href="{{ route('events.edit', $event->id) }}">
                                <button class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">Edit</button>
                            </a>
                            
                            <button class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#events').DataTable({
                dom: 'lBfrtip',
                "scrollX": true,
                responsive: false,
                processing: true,
                serverSide: false,
                pagingType: "full_numbers",
                pageLength: 5,
                lengthMenu: [5, 10, 20, 50, 100],
                order: [[4, "asc"]],
            });
        } );
    </script>
@endsection