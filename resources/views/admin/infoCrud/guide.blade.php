@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">Content Guide
                            </div>


                        </div>
                    </div>
                    <div class="card-body">

                        @if($errors)
                        <div class="error_blog">

                        </div>
                        <div class="row">

                        @foreach ($errors->all() as $message)
                        <div class="col error_div" style="color: red">{{ $message }}</div>
                        @endforeach
                        </div>

                        @endif
                        @isset($language)
                            <form action="{{route('storeGuide')}}" method="Post">
                                {{ csrf_field() }}
                                {{ method_field('Post') }}
                                <div class="row pull-center">

                                    @foreach($language as $lang)
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="title_blog">{{$lang->translation}}_Title</label>

                                                <input type="text" name="title[{{$lang->id}}]" class="form-control"
                                                       id="title_blog" value="">


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach($language as $desc)
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="description_guide">{{$desc->translation}}
                                                    _Description</label>
                                                <textarea class="form-control" name="description[{{$desc->id}}]"
                                                          rows="5" id="description_guide"></textarea>


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-default " id="createguide">Create
                                </button>
                            </form>
                        @endisset
                        @isset($guide)
                            <form action="{{route('guideUpdate', $guide[0]->about_id)}}" method="Post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row pull-center">
                                    @foreach($guide as $value)
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="title_guide">{{$value->language->translation}}_Title</label>

                                                <input type="text" name="title[{{$value->language->id}}]" class="form-control"
                                                       id="title_guide" value="{{$value->title}}">


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach($guide  as $desc)

                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="description_guide_update">{{$desc->language->translation}}
                                                    _Description</label>
                                                <textarea class="form-control" name="desc[{{$desc->language->id}}]"
                                                          rows="5" id="description_guide_update">{{$desc->description}}
</textarea>


                                            </div>
                                        </div>


                                    @endforeach
                                </div>


                                <button type="submit" class="btn btn-default " id="updateguide">Edit
                                </button>
                            </form>
                        @endisset


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    {{--<script type="text/javascript">--}}
    {{--$('.viewCate').on('click', function () {--}}
    {{--var href = $(this).attr("href");--}}
    {{--$.ajax({--}}
    {{--type: 'get',--}}
    {{--async: false,--}}
    {{--url: href,--}}
    {{--success: function (data) {--}}
    {{--$('.card-body').append(data);--}}
    {{--$('#viewCategoryModal').modal('show');--}}


    {{--}--}}
    {{--})--}}
    {{--});--}}

    {{--//--}}
    {{--$('.editCate').on('click', function () {--}}
    {{--var href = $(this).attr("href");--}}
    {{--$.ajax({--}}
    {{--type: 'get',--}}
    {{--url: href,--}}
    {{--success: function (data) {--}}
    {{--$('.card-body').append(data);--}}
    {{--$('#editCategoryModal').modal('show');--}}


    {{--}--}}
    {{--})--}}
    {{--});--}}
    {{--//--}}
    {{--// $('form#editLang').submit( function (event) {--}}
    {{--//     event.preventDefault();--}}
    {{--//     var formDate = new FormData($(this)[0]);--}}
    {{--//--}}
    {{--//     $.ajax({--}}
    {{--//         type:'PUT',--}}
    {{--//         date:formDate,--}}
    {{--//         success: function (data) {--}}
    {{--//--}}
    {{--//--}}
    {{--//--}}
    {{--//             alert(data);--}}
    {{--//         },--}}
    {{--//         error:function () {--}}
    {{--//             alert("Error")--}}
    {{--//         }--}}
    {{--//     })--}}
    {{--// });--}}
    {{--//--}}
    {{--$('.createCat').on('click', function () {--}}
    {{--var href = $(this).attr("href");--}}
    {{--$.ajax({--}}
    {{--type: 'get',--}}
    {{--url: href,--}}
    {{--success: function (data) {--}}
    {{--$('.card-body').append(data);--}}
    {{--$('#createCatModal').modal('show');--}}


    {{--}--}}
    {{--})--}}



    {{--})--}}

    {{--$('form#create').submit( function (event) {--}}
    {{--event.preventDefault();--}}
    {{--var formDate = new FormData($(this)[0]);--}}

    {{--$.ajax({--}}
    {{--type:'Post',--}}
    {{--date:formDate,--}}
    {{--success: function (data) {--}}



    {{--alert(data);--}}
    {{--},--}}
    {{--error:function () {--}}
    {{--alert(2333)--}}
    {{--}--}}
    {{--})--}}
    {{--});--}}
    {{--</script>--}}

@endsection