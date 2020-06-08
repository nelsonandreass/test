@extends('layout.navNotLog')

@section('content')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <table class="table">
            <thead>
                <tr>
                    <td>Pic</td>
                    <td>name</td>
                    <td>Qty</td>
                    <td>price</td>
                </tr>
            </thead>
            <tbody>

                @foreach($datas as $product)
                <tr>
                    <td width="50px">
                        @foreach($product->galleries as $gambar)
                        <?php
                        $gambar = substr($gambar->filepath, 7);
                        ?>
                        <img src="{{asset('storage/' . $gambar)}}" alt="">
                        <br>
                        @endforeach
                    </td>
                    @foreach($product->products as $name)
                        <td>
                            {{$name->name}}
                        </td>
                        <td>
                            {{$product->qty}}
                        </td>
                        <td>
                            <?php
                                $price = $product->qty * $name->price; 
                            ?>
                            {{$price}}
                        </td>
                    @endforeach
                    
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>
</div>

@endsection