@extends('layout.layout')

@section('content')
    <div class="container">
        <form action="{{url('admin/productprocess')}}" method="post" class="form-group" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label> 
            <input type="text" class="form-control" name="name">

            <label for="desc">Description</label>
            <textarea  id="" rows="10" class="w-100 form-control" name="description"></textarea>

            <label for="price">Price</label>
            <input type="number" class="form-control" name="price">

            <label for="status">Status</label>
            <select name="combobox" id="" class="form-control">
                <option value="stock">Stock</option>
                <option value="restock">Restock</option>
                <option value="new">New</option>
            </select>

            <label for="disc">Discount</label>
            <input type="number" name="discount" id="" class="form-control">

            <label for="pict">Picture</label>
            <input type="file" class="form-control" name="file[]" multiple>

            <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    
@endsection