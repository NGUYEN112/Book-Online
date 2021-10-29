@extends('layouts.admin-layout')
@section('admin-content')
<div class="card-header">
    <h3 class="h6 text-uppercase mb-0">Edit Product</h3>
</div>
<div class="card-body">
    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Product Name</label>
            <div class="col-md-9">
                <input required id="inputHorizontalSuccess" value="{{$product->product_name}}" name="product_name" type="text" placeholder="" class="form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Product Image</label>
            <div class="col-md-9">
                <input required id="inputHorizontalSuccess" value="{{$product->product_image}}" name="product_image" type="text" placeholder="" class="form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Product Price</label>
            <div class="col-md-9">
                <input required id="inputHorizontalSuccess" value="{{$product->product_price}}" name="product_price" type="number" placeholder="" class="form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Belong to Category</label>
            <div class="col-md-9">
                <select required id="inputHorizontalSuccess" name="category_id" class="form-control form-control-success category-select">
                    @foreach ($categories as $category)
                    <option class="category-option" value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>
                        {{$category->category_name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Belong to Group</label>
            <div class="col-md-9">
                <select required id="inputHorizontalSuccess" name="group_id" class="form-control form-control-success select-list group-select">
                    <option> Chosse your answer</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Belong to Genre</label>
            <div class="col-md-9">
                <select required id="inputHorizontalSuccess" name="genre_id" class="form-control form-control-success genre-list">
                    <option> Chosse your answer</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Product Content</label>
            <div class="col-md-9">
                <textarea required id="inputHorizontalSuccess" cols="5" rows="5" name="product_content" placeholder="" class="form-control form-control-success">{{$product->product_content}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label">Product Information</label>
            <div class="col-md-9">
                <textarea required id="inputHorizontalSuccess" cols="5" rows="5" name="product_info" placeholder="" class="form-control form-control-success">{{$product->product_info}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Other Detail</label>
            <div class="col-md-9">
                <textarea required id="inputHorizontalSuccess" cols="5" rows="5" name="other_detail" placeholder="" class="form-control form-control-success">{{$product->other_detail}}</textarea>
            </div>
        </div>

        <div class="form-group row button-container pl-auto">
            <div class="col-md-9 ml-auto">
                <input type="submit" value="Update" class="btn btn-primary">
                <a href="/manager/products" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        var category_id = $('.category-select').val()
        var group_id = jQuery.parseJSON('<?=$product->group_id?>');
        var genre_id = jQuery.parseJSON('<?=$product->genre_id?>');

        $.ajax({
            url: '/get-group-data/' + category_id,
            type: 'get',
            dataType: 'json',
            success: function(categories) {
               
                var genregroup = categories['data'];
                selectInner = "";
                if (genregroup != null) {
                    $.each(genregroup, function(index, row) {
                        if(group_id == row.id){
                            selectInner += '<option value="' + row.id + '" selected >' + row.group_name + '</option>'
                        }else {
                            selectInner += '<option value="' + row.id + '" >' + row.group_name + '</option>'
                        }
                    })
                    // console.log(selectInner)
                    $(".select-list").html(selectInner);
                }

                // onload get value of genre
                var id_group = $('.group-select').val()
                $.ajax({
                    url: '../../../get-genre-data/' + id_group,
                    type: 'get',
                    dataType: 'json',
                    success: function(genredata) {
                        var genre = genredata['data'];
                        genreInner = "";
                        if (genre != null) {
                            $.each(genre, function(index, row2) {
                                if(genre_id == row2.id) {
                                genreInner += '<option value="' + row2.id + '" selected>' + row2.genre_name + '</option>'
                            }else {
                                genreInner += '<option value="' + row2.id + '">' + row2.genre_name + '</option>'
                            }
                            })
                            $(".genre-list").html(genreInner);
                        }
                    }

                })

            }

        });


    })


    $('.category-select').change(function() {
        var id = $(this).val();
        $.ajax({
            url: '../../../get-group-data/' + id,
            type: 'get',
            dataType: 'json',
            success: function(categories) {
                var genregroup = categories['data'];
                selectInner = "<option> Chosse your answer</option>";
                if (genregroup != null) {
                    $.each(genregroup, function(index, row) {
                        selectInner += '<option value="' + row.id + '">' + row.group_name + '</option>'
                    })
                    $(".select-list").html(selectInner);
                }
            }

        })
    });

    $('.group-select').change(function() {
        var group_id = $(this).val();
        // console.log(group_id)
        $.ajax({
            url: '../../../get-genre-data/' + group_id,
            type: 'get',
            dataType: 'json',
            success: function(genregroup) {
                var genre = genregroup['data'];
                genreInner = "<option> Chosse your answer</option>";
                if (genre != null) {
                    $.each(genre, function(index, row) {
                        genreInner += '<option value="' + row.id + '">' + row.genre_name + '</option>'
                    })
                    $(".genre-list").html(genreInner);
                }
            }

        })
    });
</script>

@endsection