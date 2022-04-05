@extends('backend._layouts.app')

@section('title', __('backend-texts.faqs.title'))
@section('meta_description', __('backend-texts.faqs.description'))

@section('content_breadcrumb')
    {{ Breadcrumbs::render('faqs.index') }}
@stop

@section('content')
    <x-backend.table
        columns="10"
        controlerName="faqs"
        createBtn="Vytvoriť novú otázku"
        paginator="{{ $faqs->onEachSide(1)->links() }}"
        >

        <x-slot name="table_header">
            {{-- <x-backend.table.th width="1%">#</x-backend.table.th> --}}
            <x-backend.table.th>Otázka</x-backend.table.th>
            <x-backend.table.th>Odpoveď</x-backend.table.th>
            <x-backend.table.th class="text-center">Počet využití</x-backend.table.th>
            <x-backend.table.th-actions />
        </x-slot>

        <x-slot name="table_body">
            @foreach($faqs as $faq)
                <tr>
                    {{-- <x-backend.table.td>{{$faq->id}}</x-backend.table.td> --}}
                    <x-backend.table.td class="text-wrap text-break">{{ $faq->question }}</x-backend.table.td>
                    <x-backend.table.td class="text-wrap text-break">{{ str($faq->answer)->limit(90) }}</x-backend.table.td>
                    <x-backend.table.td class="text-center">
                        @if( $faq->static_pages_count != 0 )
                            <span class="badge bg-orange px-2 py-1">{{ $faq->static_pages_count }}</span>
                        @endif
                    </x-backend.table.td>
                    <x-backend.table.td-actions
                        controlerName="faqs"
                        identificator="{{ $faq->slug }}"
                    />
                </tr>
            @endforeach
        </x-slot>

    </x-backend.table>
@endsection
