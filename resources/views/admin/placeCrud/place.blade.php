@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">Place

                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('placeCrud.create')}}" class=" btn btn-lg createPlace "
                                   data-toggle="modal" data-target="#createModalPlace"><i class="fa fa-plus "></i>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Image Place</th>
                            </tr>
                            </thead>
                            <tbody class="state_table">


                            </tbody>
                        </table>

                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">






        {{--$('.view').on('click', function () {--}}
    {{--var href = $(this).attr("href");--}}
    {{--$.ajax({--}}
    {{--type: 'get',--}}
    {{--url: href,--}}
    {{--success: function (data) {--}}
    {{--$('.card-body').append(data);--}}
    {{--$('#myModal').modal('show');--}}


    {{--}--}}
    {{--})--}}
    {{--});--}}
    {{--$('.edit').on('click', function () {--}}
    {{--var href = $(this).attr("href");--}}
    {{--$.ajax({--}}
    {{--type: 'get',--}}
    {{--url: href,--}}
    {{--success: function (data) {--}}
    {{--$('.card-body').append(data);--}}
    {{--$('#editModal').modal('show');--}}


    {{--}--}}
    {{--})--}}
    {{--});--}}

    {{--$('form#edit').submit( function (event) {--}}
    {{--event.preventDefault();--}}
    {{--var formDate = new FormData($(this)[0]);--}}

    {{--$.ajax({--}}
    {{--type:'PUT',--}}
    {{--date:formDate,--}}
    {{--success: function (data) {--}}



    {{--alert(data);--}}
    {{--},--}}
    {{--error:function () {--}}
    {{--alert(2333)--}}
    {{--}--}}
    {{--})--}}
    {{--});--}}

    $('.createPlace').on('click', function () {
    var href = $(this).attr("href");
    $.ajax({
    type: 'get',
    url: href,
    success: function (data) {
    $('.card-body').append(data);
    $('#createModalPlace').modal('show');


    }
    })
    })

    // $('form#createPlaceMod').submit( function (event) {
    //     event.preventDefault();
    //
    //     var formDate = new FormData($(this)[0].files);
    //     formDate = formDate.fileCollection
    //
    //     $.ajax({
    //         type: 'Post',
    //         date: formDate,
    //
    //         success: function (data) {
    //         }
    //     })
    // })

    </script>

@endsection