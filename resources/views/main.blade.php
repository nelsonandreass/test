@extends('layout.layout')

@section('content')


    <div class="row mt-3">
        <div class="col-md-12">
        <h2>New Arrivals</h2>
            @foreach($newarrivals as $image)
                @foreach($image->galleries as $new)
                    <a href="{{url('product' , $image->id)}}" >
                        <div class="mySlide text-center fading">
                            <?php
                                $gambar = substr($new->filepath,7);
                            ?>
                            <img src="{{asset('storage/' . $gambar)}}">
                        </div>
                    </a>
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="row test">
        <div class="col-1"></div>
        <div class="col-10 ">
            <div class="row mx-auto">
                <div class="col-md-3 card mx-1 item">a</div>
                <div class="col-md-3 card mx-1 item">a</div>
                <div class="col-md-3 card mx-1 item">a</div>
                
            </div>
        </div>
    </div>
   
@endsection