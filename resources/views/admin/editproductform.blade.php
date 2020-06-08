@extends('layout.layout')

@section('content')
    <div class="container">
    <!-- {{url('admin/editprocess')}} -->
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$product->id}}" name="id">
            <label for="name">Name</label> 
            <input type="text" class="form-control" name="name" id="name"value="{{$product->name}}">

            <label for="desc">Description</label>
            <textarea  id="" rows="10" class="w-100 form-control" id="desc" name="description">{{$product->desc}}</textarea>

            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}">

            <label for="status">Status</label>
            <select name="combobox" id="" class="form-control">
            @if($product->status == 'stock')
                <option value="stock" selected="selected">Stock</option>
                <option value="restock">Restock</option>
                <option value="new">New</option>
            @elseif($product->status == 'restock')
                <option value="stock" >Stock</option>
                <option value="restock" selected="selected">Restock</option>
                <option value="new">New</option>
            @elseif($product->status == 'new')
                <option value="stock" >Stock</option>
                <option value="restock">Restock</option>
                <option value="new" selected="selected">New</option>
            @endif
            </select>

            <label for="disc">Discount</label>
            <input type="number" name="discount" id="" class="form-control" value="{{$product->disc}}">

            <button class="btn btn-primary mt-3" id="submit">Submit</button>
        </form>
    </div>
    


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script>
         $(document).ready(function(){
            $('#submit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      
                  }
                  
              });
               $.ajax({
                  url: "{{ url('admin/editprocess') }}",
                  method: 'post',
                  data: {
                        "name": $('#name').val(),
                        "desc": $('#desc').val(),
                        "price": $('#price').val()
                  },
                  success: function(result){
                     console.log(result);
                  }});

            });
        });
</script>