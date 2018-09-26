@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">Category

                            </div>
                            <div class="col-md-2 text-right">
                                <a href="{{ route('categoryCrud.create')}}" class="createCat"
                                   data-toggle="modal" data-target="#createCatModal"><i class="fa fa-plus "></i>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            @if($errors)
                                <div class="error_blog">

                                </div>
                                <div class="row">

                                    @foreach ($errors->all() as $message)
                                        <div class="col error_div" style="color: red">{{ $message }}</div>
                                    @endforeach
                                </div>

                            @endif
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="state_table">
                            @foreach($category as $cat)
                                <tr>
                                    <th scope="row" class="id">{{$cat->id}}</th>
                                    <td>{{$cat->category_translates[0]->name}}</td>

                                    <td class="text-center">
                                        <div class="col-md-3 float-right">

                                            <div class="row">

                                                <div class="col-md-4"><a href="{{ route('categoryCrud.show', $cat->id) }}" class="viewCate" data-toggle="modal" data-target="#viewCategoryModal"><i class="far fa-eye"></i></a></div>
                                                <div class="col-md-4"><a href="{{ route('categoryCrud.edit',$cat->id) }}" class="editCate" data-toggle="modal" data-target="#editCategoryModal"><i class="fas fa-pencil-alt text-success"></i></a></div>
                                                <div class="col-md-4">
                                                    <form id="delete-form-{{  $cat->id }}" method="post" action="{{ route('categoryCrud.destroy',$cat->id) }}" >
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <a href="" onclick="
                                                                if(confirm('Are you sure, You Want to delete this?'))
                                                                {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $cat->id}}').submit();
                                                                }
                                                                else{
                                                                event.preventDefault();
                                                                }" > <i class="fas fa-trash-alt text-danger"></i></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>



                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        {{--<div class="col-md-12">--}}
                            {{--{{$languages->links()}}--}}

                        {{--</div>--}}
                        <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
        $('.viewCate').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                async: false,
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#viewCategoryModal').modal('show');


                }
            })
        });

        //
        $('.editCate').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#editCategoryModal').modal('show');


                }
            })
        });
        //
        // $('form#editLang').submit( function (event) {
        //     event.preventDefault();
        //     var formDate = new FormData($(this)[0]);
        //
        //     $.ajax({
        //         type:'PUT',
        //         date:formDate,
        //         success: function (data) {
        //
        //
        //
        //             alert(data);
        //         },
        //         error:function () {
        //             alert("Error")
        //         }
        //     })
        // });
        //
        $('.createCat').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#createCatModal').modal('show');


                }
            })



        })

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
    </script>

@endsection