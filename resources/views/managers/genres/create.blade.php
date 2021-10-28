@extends('layouts.admin-layout')
@section('admin-content')
<div class="card-header">
    <h3 class="h6 text-uppercase mb-0">Create New Genre</h3>
</div>
<div class="card-body">
    <form action="" method="POST" class="form-horizontal">
        @csrf

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Genre Name</label>
            <div class="col-md-9">
                <input id="inputHorizontalSuccess" name="genre_name" type="text" placeholder="" class="form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Belong to Category</label>
            <div class="col-md-9">
                <select id="inputHorizontalSuccess" name="category_id"  class="form-control form-control-success category-select">
                    @foreach ($categories as $category)
                    <option class="category-option" value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Belong to Group</label>
            <div class="col-md-9">
                <select id="inputHorizontalSuccess" name="group_id"  class="form-control form-control-success select-list">
               
            </select>
            </div>
        </div>

        <div class="form-group row button-container pl-auto">
            <div class="col-md-9 ml-auto">
                <input type="submit" value="Create" class="btn btn-primary">
                <a href="/manager/genres" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
</div>

<script>
    $('.category-select').change(function() {
        var id = $(this).val();
        $.ajax({
        url: '../../get-group-data/' +id,
        type: 'get',
        dataType: 'json',
        success: function(categories){
            var genregroup = categories['data'];
            selectInner = "";
            if (genregroup != null) {
                $.each(genregroup, function(index,row) {
                selectInner += '<option value="' +row.id +  '">'+ row.group_name + '</option>'
                })
                $(".select-list").html(selectInner);
            }
            
            
            
        }
        
    })
    });

    
</script>

@endsection