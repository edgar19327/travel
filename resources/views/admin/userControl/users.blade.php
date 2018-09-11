@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10"> Users

                            </div>
                            <div class="col-md-2 text-right">
                                <a href="{{ route('userControl.create')}}" class="createUsericon "
                                   data-toggle="modal" data-target="#createModalUser"><i class="fa fa-plus "></i>
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
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="state_table">
                            @foreach($users as $user)
                                <tr>

                                    <th scope="row" class="id">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->surname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td class="text-center">
                                        <div class="col-md-12 float-right">
                                            <div class="row">

                                                <div class="col-md-4"><a
                                                            href="{{ route('userControl.show',$user->id) }}"
                                                            class="viewUser" data-toggle="modal"
                                                            data-target="#viewUserModal"><i class="far fa-eye"></i></a>
                                                </div>
                                                <div class="col-md-4"><a
                                                            href="{{ route('userControl.edit',$user->id) }}"
                                                            class="editUser" data-toggle="modal"
                                                            data-target="#editModalUser"><i
                                                                class="fas fa-pencil-alt text-success"></i></a></div>
                                                <div class="col-md-4">
                                                    <form id="delete-form-{{$user->id }}" method="post"
                                                          action="{{ route('userControl.destroy',$user->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <a href="" onclick="
                                                                if(confirm('Are you sure, You Want to delete this?'))
                                                                {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{$user->id}}').submit();
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
                                {{$users->links()}}

                            </div>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">


        $('.viewUser').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#userViewsModal').modal('show');


                }
            })
        });

        $('.editUser').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#editModalUser').modal('show');


                }
            })
        });

        {{--$('form#edit').submit( function (event) {--}}
        {{--event.preventDefault();--}}
        {{--var formDate = new FormData($(this)[0]);--}}

        $('.createUsericon').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                async: false,
                url: href,
                success: function (data) {
                    $('.card-body').append(data);


                },


            })
        });


    </script>

@endsection