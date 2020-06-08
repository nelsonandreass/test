@extends('layout.layout')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pic</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Disc</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $i = 1?>
                @foreach($products as $product)
                    <tr>
                        <td>{{$i}}</td>
                        <td>
                        
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            <div class="row">
                                <div class="col-3">
                                    <form action="{{url('admin/editpage')}}">
                                        <input type="hidden" value="{{$product->id}}" name="edit">
                                        <button class="btn btn-success">Edit</button>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form action="{{url('admin/delete')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}" name="id">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php ++$i?>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection