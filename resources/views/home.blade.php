@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


                <h1>Page Builder</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet accusantium
                    cumque perferendis molestiae exercitationem deleniti sequi, pariatur ipsam,
                     veritatis nemo aliquam sed dolorem a ipsa autem ab sapiente voluptates iure?
                     Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                     Iste quaerat fugit dolore! Repellat ullam reprehenderit ipsa magni voluptate alias eveniet fugiat,
                     similique dolorum, ex porro dicta quia quo dolor iusto.
                     Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Deleniti, itaque porro culpa accusantium omnis ipsam officia dolorem libero corrupti ullam iusto hic id ex
                     sint,cum perspiciatis. Deleniti, facilis esse! Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                     Vitae earum, repellat omnis vel, iure,
                     reprehenderit laudantium est tenetur totam accusamus eos exercitationem minus officiis sed hic alias nobis
                     delectus optio!
                </p>
                <a href="{{ url('/generate') }}" class="btn btn-primary btn-lg">Generate</a>

        </div>
    </div>
</div>
@endsection
