@extends('layout.layout')

@section('content')

    <div class="col-12" style="max-height: 100vh;">
        @foreach($newarrivals as $image)
            @foreach($image->galleries as $new)
                <a href="{{url('product' , $image->id)}}">
                    <div class="mySlide">
                        <?php
                            $gambar = substr($new->filepath,7);
                        ?>
                    <img src="{{asset('storage/' . $gambar)}}" style="width: 100%">
                    </div>
                </a>
                @break
            @endforeach
        @endforeach

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

@endsection