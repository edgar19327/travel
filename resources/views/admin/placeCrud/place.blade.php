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
                            <div class="col-md-2 text-right">
                                <a href="{{ route('placeCrud.create')}}" class="createPlace "
                                   data-toggle="modal" data-target="#createModalPlace"><i class="fa fa-plus "></i>
                                </a>

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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="state_table">
                            @foreach($placeAll as $place)
                                <tr>

                                <th scope="row" class="id">{{$place->place->id}}</th>
                                <td>{{$place->title}}</td>
                                <td>{{substr($place->description, 0, 130 )}}...</td>
                                <td class="text-center">
                                    <div class="col-md-12 float-right">
                                        <div class="row">

                                            <div class="col-md-4"><a href="{{ route('placeCrud.show',$place->place->id) }}"
                                                                     class="view" data-toggle="modal"
                                                                     data-target="#placeViewsModal"><i class="far fa-eye"></i></a>
                                            </div>
                                            <div class="col-md-4"><a href="{{ route('placeCrud.edit',$place->place->id) }}"
                                                                     class="edit" data-toggle="modal"
                                                                     data-target="#editModal"><i
                                                            class="fas fa-pencil-alt text-success"></i></a></div>
                                            <div class="col-md-4">
                                                <form id="delete-form-{{$place->place->id }}" method="post"
                                                      action="{{ route('placeCrud.destroy',$place->place->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <a href="" onclick="
                                                            if(confirm('Are you sure, You Want to delete this?'))
                                                            {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $place->place->id}}').submit();
                                                            }
                                                            else{
                                                            event.preventDefault();
                                                            }"> <i class="fas fa-trash-alt text-danger"></i></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                            <div class="col-md-12">
                                {{$placeAll->links()}}

                            </div>
                        <!-- Modal -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">


        $('.view').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#placeViewsModal').modal('show');


                }
            })
        });

        $('.edit').on('click', function () {
        var href = $(this).attr("href");
        $.ajax({
        type: 'get',
        url: href,
        success: function (data) {
        $('.card-body').append(data);
        $('#editModalPlace').modal('show');


        }
        })
        });

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