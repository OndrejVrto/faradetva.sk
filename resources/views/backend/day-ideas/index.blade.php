@extends('backend._layouts.app')

@section('title', __('backend-texts.day-ideas.title'))
@section('meta_description', __('backend-texts.day-ideas.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('day-ideas.index') }}
@stop

@section('content')
    <x-backend.table
        columns="10"
        controlerName="day-ideas"
        createBtn="Pridať novú myšlienku dňa"
        paginator="{{ $ideas->onEachSide(1)->links() }}"
    >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th width="20%">Autor</x-backend.table.th>
            <x-backend.table.th>Citát</x-backend.table.th>
            <x-backend.table.th-actions/>
        </x-slot>

        <x-slot name="table_body">
            @foreach($ideas as $idea)
                <x-backend.table.tr>

                    {{-- <x-backend.table.td>{{$idea->id}}</x-backend.table.td> --}}
                    <x-backend.table.td class="text-wrap text-break">{{ $idea->author }}</x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{ str($idea->idea)->limit(120) }}</x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="day-ideas"
                        identificator="{{ $idea->id }}"
                    />

                </x-backend.table.tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
