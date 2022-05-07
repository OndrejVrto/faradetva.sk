@extends('admin._layouts.app')

@section('title', __('backend-texts.faqs.title'))
@section('meta_description', __('backend-texts.faqs.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('faqs.index') }}
@stop

@section('content')
    <x-admin.table
        columns="10"
        controlerName="faqs"
        createBtn="Vytvoriť novú otázku"
        paginator="{{ $faqs->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-admin.table.th width="1%">#</x-admin.table.th> --}}
            <x-admin.table.th>Otázka</x-admin.table.th>
            <x-admin.table.th>Odpoveď</x-admin.table.th>
            <x-admin.table.th class="text-center">Počet využití</x-admin.table.th>
            <x-admin.table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($faqs as $faq)
                <tr>
                    {{-- <x-admin.table.td>{{$faq->id}}</x-admin.table.td> --}}
                    <x-admin.table.td class="text-wrap text-break">{{ $faq->question }}</x-admin.table.td>
                    <x-admin.table.td class="text-wrap text-break">{{ str($faq->answer)->limit(70) }}</x-admin.table.td>
                    <x-admin.table.td class="text-center">
                        @if( $faq->static_pages_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $faq->static_pages_count }}</span>
                        @endif
                    </x-admin.table.td>
                    <x-admin.table.td-actions
                        controlerName="faqs"
                        identificator="{{ $faq->slug }}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-admin.table>
@endsection
