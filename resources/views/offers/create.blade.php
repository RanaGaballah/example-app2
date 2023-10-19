@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">add your offer</div>

                <div class="card-body">

                @if(Session::has('success'))
                <div class="alert alert-primary" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif

                    <form method="POST" action="{{route('offer.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">name</label>
                            <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input name="price"  type="text" class="form-control" placeholder="Price">
                            @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" >
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">add offer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection