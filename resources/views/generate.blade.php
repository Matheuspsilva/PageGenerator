@extends("layouts.app")
@section('content')
    <div class="container mt-4">

        <h2>QR Code Image Generator</h2>

        <form name="generate-qrcode-form" id="generate-qrcode-form" method="post" action="{{ route('qrcode') }}">
            @csrf
            <div class="input-group">
                <span class="input-group-text" id="basic-addon3">
                     <label for="name">Name</label>
                </span>
                <input type="text" id="name" name="name" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="linkedin">Linkedin</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="linkedin">Github</label>
                <input type="text" id="github" name="github" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Generate Image</button>
        </form>

    </div>
@endsection

