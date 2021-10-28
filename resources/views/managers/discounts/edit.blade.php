@extends('layouts.admin-layout')
@section('admin-content')
<div class="card-header">
    <h3 class="h6 text-uppercase mb-0">Create New Discount Program</h3>
</div>
<div class="card-body">
    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Date to begin</label>
            <div class="col-md-9">
                <input required id="inputHorizontalSuccess" value="{{$discount->start_date}}" name="start_date" type="date" placeholder="" class="form-control form-control-success">
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-3 form-control-label">Date to end</label>
            <div class="col-md-9">
                <input required id="inputHorizontalSuccess" value="{{$discount->end_date}}" name="end_date" type="date" placeholder="" class="form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Discount value</label>
            <div class="col-md-9">
                <input required id="inputHorizontalSuccess" value="{{$discount->discount_value}}" name="discount_value" type="number" placeholder="" class="form-control form-control-success">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Category apply for </label>
            <div class="col-md-9">
                <div class="custom-control custom-radio custom-control-inline">
                    @if($discount->category_id != null)
                    <input checked type="radio" id="radio1" name="category" value="single" class="custom-control-input">
                    @else
                    <input type="radio" id="radio1" name="category" value="single" class="custom-control-input">
                    @endif
                    <label for="radio1" class="custom-control-label">Single</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    @if($discount->category_id == null)
                    <input checked type="radio" id="radio2" name="category" value="all" class="custom-control-input">
                    @else
                    <input  type="radio" id="radio2" name="category" value="all" class="custom-control-input">
                    @endif
                    <label for="radio2" class="custom-control-label">All</label>
                </div>
            </div>
        </div>

        <div class="form-group row category-chosse">
            <label class="col-md-3 form-control-label"></label>
            <div class="col-md-9 line-break">
                <select id="inputHorizontalSuccess" name="category_id" class="form-control form-control-success category-select">
                    <option></option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$discount->category_id == $category->id ? "selected": ""}}>
                        {{$category->category_name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row category-chosse">
            <label class="col-md-3 form-control-label">Genre group apply for </label>
            <div class="col-md-9">
                @if($discount->group_id != null)
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="radio3" name="group" value="single" class="custom-control-input">
                    <label for="radio3" class="custom-control-label">Single</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radio4" name="group" value="all" class="custom-control-input">
                    <label for="radio4" class="custom-control-label">All</label>
                </div>
                @else
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="radio3" name="group" value="single" class="custom-control-input">
                    <label for="radio3" class="custom-control-label">Single</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="radio4" name="group" value="all" class="custom-control-input">
                    <label for="radio4" class="custom-control-label">All</label>
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row group-chosse">
            <label class="col-md-3 form-control-label"></label>
            <div class="col-md-9 line-break">
                <select id="inputHorizontalSuccess" name="group_id" class="form-control form-control-success group-selected select-list">
                    <option></option>
                </select>
            </div>
        </div>

        <!-- Genre Select -->
        <div class="form-group row category-chosse">
            <label class="col-md-3 form-control-label">Genre apply for </label>
            <div class="col-md-9">
                @if($discount->genre_id != null)
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="radio5" name="genre" value="single" class="custom-control-input">
                    <label for="radio5" class="custom-control-label">Single</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input  type="radio" id="radio6" name="genre" value="all" class="custom-control-input">
                    <label for="radio6" class="custom-control-label">All</label>
                </div>
                @else
                <div class="custom-control custom-radio custom-control-inline">
                    <input  type="radio" id="radio5" name="genre" value="single" class="custom-control-input">
                    <label for="radio5" class="custom-control-label">Single</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="radio6" name="genre" value="all" class="custom-control-input">
                    <label for="radio6" class="custom-control-label">All</label>
                </div>
                @endif
            </div>
        </div>
        <!--  -->

        <div class="form-group row genre-chosse">
            <label class="col-md-3 form-control-label"></label>
            <div class="col-md-9 line-break">
                <select id="inputHorizontalSuccess" name="genre_id" class="form-control form-control-success genre-list">
                    <option  ></option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label">Applied to the price</label>
            <div class="col-md-9">
                @if($discount->the_range_from != null || $discount->the_range_to != null)
                <div class="custom-control custom-radio custom-control-inline">
                    <input  type="radio" id="radio7" name="price" value="none" class="custom-control-input">
                    <label for="radio7" class="custom-control-label">None</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="radio8" name="price" value="range" class="custom-control-input">

                    <label for="radio8" class="custom-control-label">Range</label>
                </div>
                @else
                <div class="custom-control custom-radio custom-control-inline">
                    <input checked type="radio" id="radio7" name="price" value="none" class="custom-control-input">
                    <label for="radio7" class="custom-control-label">None</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input  type="radio" id="radio8" name="price" value="range" class="custom-control-input">

                    <label for="radio8" class="custom-control-label">Range</label>
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row value-chosse">
            <label class="col-md-3 form-control-label"></label>
            <div class="col-md-9 line-break">
                <input id="inputHorizontalSuccess" value="{{$discount->the_range_from}}" name="the_range_from" type="number" placeholder="$" class="form-control form-control-success">
                <p>To</p>
                <input id="inputHorizontalSuccess" value="{{$discount->the_range_to}}" name="the_range_to" type="number" placeholder="$" class="form-control form-control-success">

            </div>
        </div>



        <div class="form-group row button-container pl-auto">
            <div class="col-md-9 ml-auto">
                <input type="submit" value="Create" class="btn btn-primary">
                <a href="/manager/discounts" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        if ($('input[type=radio][name=category][id=radio1]').is(':checked') == true) {
                $('.category-chosse').addClass("show");
        }

        if ($('input[type=radio][name=group][id=radio3]').is(':checked') == true) {
                $('.group-chosse').addClass("show");
        }

        if ($('input[type=radio][name=genre][id=radio5]').is(':checked') == true) {
                $('.genre-chosse').addClass("show");
        }

        if ($('input[type=radio][name=price][id=radio8]').is(':checked') == true) {
                $('.value-chosse').addClass("show");
        }

        //get value selected


        var category_id = $('.category-select').val()
        var discount = jQuery.parseJSON('<?=$discount?>');
        $.ajax({
            url: '../../../get-group-data/' + category_id,
            type: 'get',
            dataType: 'json',
            success: function(categories) {
                var genregroup = categories['data'];
                selectInner = "<option></option>";
                if (genregroup != null) {
                    $.each(genregroup, function(index, row) {
                        if(discount.group_id == row.id){
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
                        genreInner = "<option></option>";
                        if (genre != null) {
                            $.each(genre, function(index, row2) {
                                if(discount.genre_id == row2.id) {
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
    //category radio
    $('input[type=radio][name=category]').change(function() {
        if ($('input[type=radio][name=category][id=radio1]').is(':checked') == true) {
                $('.category-chosse').addClass("show");
        }
        else {
        $('.category-chosse').removeClass("show");
            }
        })

    //genre group radio
    $('input[type=radio][name=group]').change(function() {

        if ($('input[type=radio][name=group][id=radio3]').is(':checked') == true) {
                $('.group-chosse').addClass("show");
        }
        else {
        $('.group-chosse').removeClass("show");
            }
    })

    //genre radio
    $('input[type=radio][name=genre]').change(function() {
        if ($('input[type=radio][name=genre][id=radio5]').is(':checked') == true) {
                $('.genre-chosse').addClass("show");
        }
        else {
        $('.genre-chosse').removeClass("show");
            }
    })

    // value radio
    $('input[type=radio][name=price]').change(function() {
        // $('.value-chosse').toggleClass("show");
        if ($('input[type=radio][name=price][id=radio8]').is(':checked') == true) {
                $('.value-chosse').addClass("show");
        }
        else {
        $('.value-chosse').removeClass("show");
            }
    })


    // Get value
    $('.category-select').change(function() {
        var id = $(this).val();
        $.ajax({
            url: '../../../get-group-data/' + id,
            type: 'get',
            dataType: 'json',
            success: function(categories) {
                var genregroup = categories['data'];
                selectInner = "<option></option>";
                if (genregroup != null) {
                    $.each(genregroup, function(index, row) {
                        selectInner += '<option value="' + row.id + '">' + row.group_name + '</option>'
                    })
                    $(".select-list").html(selectInner);
                }
            }

        })
    });

    $('.select-list').change(function() {
        var group_id = $(this).val();
        // console.log(group_id)
        $.ajax({
            url: '../../../get-genre-data/' + group_id,
            type: 'get',
            dataType: 'json',
            success: function(genregroup) {
                var genre = genregroup['data'];
                genreInner = "<option></option>";
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