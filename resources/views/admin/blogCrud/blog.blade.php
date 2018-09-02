@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">Blog

                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('blogCrud.create')}}" class=" createBlog "
                                   data-toggle="modal" data-target="#createModalBlog"><i class="fa fa-plus "></i>
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
                                <th scope="col">PLace Name</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="state_table">
                            @foreach($blogs as $blog)

                                <tr>
                                    <th scope="row" class="id">{{$blog->id}}</th>
                                    <td>{{$blog->blog_translates[0]->title}}</td>
                                    <td>{{substr($blog->blog_translates[0]->description, 0, 130 )}}...</td>
                                    <td>{{$blog->blog_translates[0]->place->place_translates[0]->title}}</td>
                                    <td class="text-center">
                                        <div class="col-md-12 float-right">
                                            <div class="row">
{{----}}
                                                <div class="col-md-4"><a href="{{ route('blogCrud.show',$blog->id) }}"
                                                                         class="viewBlog" data-toggle="modal"
                                                                         data-target="#blogViewsModal"><i class="far fa-eye"></i></a>
                                                </div>
                                                <div class="col-md-4"><a href="{{ route('blogCrud.edit',$blog->id) }}"
                                                                         class="editBlog" data-toggle="modal"
                                                                         data-target="#editModalBlog"><i
                                                                class="fas fa-pencil-alt text-success"></i></a></div>
                                                <div class="col-md-4">
                                                    <form id="delete-form-{{$blog->id }}" method="post"
                                                          action="{{ route('blogCrud.destroy',$blog->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
{{----}}
                                                        <a href="" onclick="
                                                                if(confirm('Are you sure, You Want to delete this?'))
                                                                {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $blog->id}}').submit();
                                                                }
                                                                else{
                                                                event.preventDefault();
                                                                }"> <i class="fas fa-trash-alt text-danger"></i></a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
{{----}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                            <div class="col-md-12">
                                {{$blogs->links()}}

                            </div>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">


        $('.viewBlog').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#blogViewsModal').modal('show');


                }
            })
        });

        $('.editBlog').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#editModalBlog').modal('show');


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

        $('.createBlog').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#createModalBlog').modal('show');


                }
            })
        })

        {{--// $('form#createPlaceMod').submit( function (event) {--}}
        {{--//     event.preventDefault();--}}
        {{--//--}}
        {{--//     var formDate = new FormData($(this)[0].files);--}}
        {{--//     formDate = formDate.fileCollection--}}
        {{--//--}}
        {{--//     $.ajax({--}}
        {{--//         type: 'Post',--}}
        {{--//         date: formDate,--}}
        {{--//--}}
        {{--//         success: function (data) {--}}
        {{--//         }--}}
        {{--//     })--}}
        {{--// })--}}

    </script>

@endsection