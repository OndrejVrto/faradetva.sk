@extends('admin._layouts.app')

@section('title', __('backend-texts.day-ideas.title'))
@section('meta_description', __('backend-texts.day-ideas.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('day-ideas.index') }}
@stop

@section('content')
    <x-admin.table
        columns="10"
        controlerName="day-ideas"
        createBtn="Pridať novú myšlienku dňa"
        paginator="{{ $ideas->onEachSide(1)->links() }}"
    >

        <x-slot:table_header>
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th width="20%">Autor</x-admin.table.th>
            <x-admin.table.th>Citát</x-admin.table.th>
            <x-admin.table.th-actions/>
        </x-slot>

        <x-slot:table_body>
            @foreach($ideas as $idea)
                <x-admin.table.tr>

                    {{-- <x-admin.table.td>{{$idea->id}}</x-admin.table.td> --}}
                    <x-admin.table.td class="text-wrap text-break">{{ $idea->author }}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{ str($idea->idea)->limit(120) }}</x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="day-ideas"
                        identificator="{{ $idea->id }}"
                    />

                </x-admin.table.tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
