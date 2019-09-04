@extends('layouts.admin')

@section('content')

        @component('admin.includes.title')
            Site Info
        @endcomponent

        @if(Session::has('flash_admin'))
            <div class="flash_message">
                {{Session('flash_admin')}}
            </div>
            @endif

    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="/admin/site/{{$site->id}}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{$site->address}}">
                </div>

                <div class="form-group">
                    <label for="b_hours">B Hours</label>
                    <input type="text" class="form-control" name="b_hours" value="{{$site->b_hours}}">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$site->phone}}">
                </div>

                <button type="submit" class="btn btn-primary">Make Changes</button>
            </form>
        </div>

    </div>


@endsection


