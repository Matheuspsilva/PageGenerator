<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Buzzvel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <h2>QR Code Image Generator</h2>

        <form name="generate-qrcode-form" id="generate-qrcode-form" method="post" action="{{route('qrcode')}}">
            @csrf
             <div class="form-group">
               <label for="name">Name</label>
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
</body>
</html>
