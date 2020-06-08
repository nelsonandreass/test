@extends('layout.layout')

@section('content')'
    <div class="row">
        <div class="col-1"></div>
        
        <div class="col-10">
            <div class="row">
                <div class="col-6">
                    @foreach($product->galleries as $gallery)
                        <?php
                            $gambar = substr($gallery->filepath,7);
                        ?>
                        <img src="{{asset('storage/' . $gambar)}}" alt="">
                        <!-- masih di break -->
                        @break
                    @endforeach 
                </div>
                <div class="col-6">
                    <div class="row">
                        <h2>{{$product->name}}</h2>
                        
                    </div>
                    <div class="row">
                        <br>
                        <p>{{$product->price}} &nbsp;&nbsp;&nbsp;&nbsp; {{$product->discount}}%</p>
                    </div>
                    <div class="row">
                        <button class="btn btn-success">Buy</button>
                        <button class="btn btn-secondary" onclick="show()">Add to chart</button>
                    </div>
                </div>
                <div id="details">
                        <div class="col-12 text-center">
                            <p>{{$product->name}}</p>
                        </div>
                            <button onclick="plus(-1)" id="min">-</button>
                            <button onclick="plus(1)" id="plus">+</button>
                        <form action="{{url('/transaction/addToChart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="productId" value="{{$product->id}}">
                            <input class="col-11" type="text" id="qty" value="1" name="qty"></input>

                            <div class="row">
                                <button class="btn btn-primary mx-auto">+ Add</button>
                            </div>
                        </form>
                        
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>{{$product->desc}}</p>
                </div>
            </div>
        </div>
        
        <div class="col-1"></div>    
    </div>
@endsection

<script>
    var num = 1;
    $(document).ready(function(){
        $('#qty').val(num);
        console.log(num);
        $('#min').click(function(e){
            e.prefentDefault();
            num -= 1;
            $('#qty').val(num);
        });
        $('#plus').ready(function(e){
            e.preventDefault();
            num += 1;
            $('#qty').val(num);
        });
    })

    
</script>
<script>
    var num = 1;
    function plus(n){
        num += n;
        document.getElementById("qty").value = num;
        var details = document.getElementById("details");
        if(num < 1){
            details.style.display = "none";
            num = 1;
        }
    }

    function show(){
        document.getElementById("details").style.display = "block"; 
    }
</script>