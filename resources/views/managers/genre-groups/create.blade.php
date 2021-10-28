@extends('layouts.admin-layout')
@section('admin-content')
<div class="card-header">
    <h3 class="h6 text-uppercase mb-0">Create New Genre Group</h3>
</div>
<div class="card-body">
    <form action="" method="POST" class="form-horizontal">
        @csrf

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Group Name</label>
            <div class="col-md-9">
                <input id="inputHorizontalSuccess" name="group_name" type="text" placeholder="" class="form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Belong to </label>
            <div class="col-md-9">
                <select id="inputHorizontalSuccess" name="category_id"  class="form-control form-control-success">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row button-container pl-auto">
            <div class="col-md-9 ml-auto">
                <input type="submit" value="Create" class="btn btn-primary">
                <a href="/manager/genre-group" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
</div>

@endsection