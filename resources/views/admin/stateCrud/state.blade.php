@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-10">State
                            @if($errors->any())
                                {{$errors->all()}}
                            @endif
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('state.create')}}" class="create"
                               data-toggle="modal" data-target="#createModal"><i class="fa fa-plus "></i>
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
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="state_table">
                            @foreach($name as $sate)
                                <tr>
                                    <th scope="row" class="id">{{$sate->state->id}}</th>
                                    <td>{{$sate->name}}</td>
                                    <td class="text-center">
                                        <div class="col-md-3 float-right">
                                        <div class="row">

                                            <div class="col-md-4"><a href="{{ route('state.show',$sate->state->id) }}" class="view" data-toggle="modal" data-target="#viewModal"><i class="far fa-eye"></i></a></div>
                                        <div class="col-md-4"><a href="{{ route('state.edit',$sate->state->id) }}" class="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt text-success"></i></a></div>
                                        <div class="col-md-4">
                                            <form id="delete-form-{{ $sate->state->id }}" method="post" action="{{ route('state.destroy',$sate->state->id) }}" >
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <a href="" onclick="
                                                        if(confirm('Are you sure, You Want to delete this?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $sate->state->id}}').submit();
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
                  $('#myModal').modal('show');


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
                  $('#editModal').modal('show');


              }
          })
      });

      $('form#edit').submit( function (event) {
          event.preventDefault();
          var formDate = new FormData($(this)[0]);

          $.ajax({
              type:'PUT',
              date:formDate,
              success: function (data) {



                  alert(data);
              },
              error:function () {
                  alert(2333)
              }
          })
      });

      $('.create').on('click', function () {
          var href = $(this).attr("href");
          $.ajax({
              type: 'get',
              url: href,
              success: function (data) {
                  $('.card-body').append(data);
                  $('#createModal').modal('show');


              }
          })



      })

      $('form#create').submit( function (event) {
          event.preventDefault();
          var formDate = new FormData($(this)[0]);

          $.ajax({
              type:'Post',
              date:formDate,
              success: function (data) {



                  alert(data);
              },
              error:function () {
                  alert(2333)
              }
          })
      });
    </script>

@endsection