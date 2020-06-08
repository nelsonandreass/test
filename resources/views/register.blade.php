@extends('layout.navNotLog')

@section('content')
    <div class="row">
    
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="{{url('/registerprocess')}}" class="mt-3" method="POST">
                @csrf
                <div class="card ">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">E-Mail</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="">Repeat Password</label>
                                <input type="password" name="repassword" class="form-control" id="repassword">
                            </div>
                                <input type="hidden" name="role" value="User">
                            <button class="btn btn-primary">Submit</button>
                            <p class="form-message"></p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
   
    <script>
        $(document).ready(function(){
            $("form").submit(function(e){
                e.preventDefault();
                var email = $("#email").val();
                var name = $("#name").val();
                var password = $("#password").val();
                var repass = $("#repassword").val();
                $(".form-message").load()
            });
        });
    </script>
@endsection