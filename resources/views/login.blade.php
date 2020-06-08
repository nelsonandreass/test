@extends('layout.navNotLog')

@section('content')
    <div class="row">
    
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="{{url('/loginprocess')}}" class="mt-3" method="POST">
                @csrf
                <div class="card ">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">E-Mail</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button class="btn btn-primary">Submit</button>
                            <p id="form-message"></p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-1"></div>
    </div>
   
@endsection