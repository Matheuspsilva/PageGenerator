@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div>
            <h2 class="main-title-1">Hello, my name is {{ $card->name }}</h2>

            <h1 class="fw-bold mb-5">My History</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Iste quaerat fugit dolore! Repellat ullam reprehenderit ipsa magni voluptate alias eveniet fugiat,
                similique dolorum, ex porro dicta quia quo dolor iusto.
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Deleniti, itaque porro culpa accusantium omnis ipsam officia dolorem libero corrupti ullam iusto hic id ex
                sint,cum perspiciatis. Deleniti, facilis esse! Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Vitae earum, repellat omnis vel, iure,
                reprehenderit laudantium est tenetur totam accusamus eos exercitationem minus officiis sed hic alias nobis
                delectus optio!
            </p>

            <a href="{{ $card->linkedin }}" class="btn btn-primary">Linkedin</a>
            <a href="{{ $card->github }}" class="btn btn-primary">Github</a>


        </div>
    </div>
@endsection
