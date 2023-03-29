@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="card text-center">
            <div class="mx-auto p-5">
                <h1 class="main-title-2">{{ $card->name }}</h1>
                <h1>Scan Me</h1>
                <img src="data:image/png;base64, {!! $qrcode !!} ">
            </div>


        </div>
    </div>
@endsection
