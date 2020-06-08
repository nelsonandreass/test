@extends('layout.layout')

@section('content')
    <div class="container">
        <form action="{{url('admin/inputprocess')}}" method="post" class="form-group" enctype="multipart/form-data" id="form">
            @csrf
            <label for="name">Name</label> 
            <input type="text" class="form-control" name="name" id="name">
            <label for="desc">Description</label>
            <textarea  id="" rows="10" class="w-100 form-control" name="description" id="desc"></textarea>
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price">
            <label for="pict">Picture</label>
            <input type="file" class="form-control" name="file[]" multiple>
            <button class="btn btn-primary mt-3" id="ajax-submit">Submit</button>
        </form>
    </div>
    
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' :$("meta[name='cstf-token']").attr('content')
            }
        });
        $('#ajax-submit').click(function(e){
            e.preventDefault();
            
            $.ajax({

                // type:'POST',

                // url:"{{url('admin/inputprocess')}}",

                // data:{name:name, password:password, email:email},

                // success:function(data){

                // alert(data.success);
                // console.log(data);

                // }

                url: "{{url('admin/inputprocess')}}",
                method: "post",
                data: {
                    name: $('#name').val(),
                    desc: $('#desc').val(),
                    price: $('#price').val(),
                },
                success: function(data){
                    alert(data.success);
                }
            });
        });
    })
</script>