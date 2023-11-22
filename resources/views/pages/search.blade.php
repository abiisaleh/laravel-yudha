@extends('template')

@section('content')
    @livewire('card.list-toko',[
        'items' => $toko,
        'heading' => 'Hasil pencarian "'.$keyword.'..."',
    ])
@endsection
