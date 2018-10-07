@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">Buttons Translate

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
                        <div class="row">


                            @foreach($button as $butt)
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-8"><h4>{{$butt->buttone_translates[0]->name}}</h4></div>
                                        <div class="col-md-4">
                                            <a href="{{ route('buttonEdit', $butt->id) }}" class="editButton"
                                               data-toggle="modal"
                                               data-target="#editModalButton"><i
                                                        class="fas fa-pencil-alt text-success"></i></a></div>
                                    </div>

                                </div>

                            @endforeach

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script src="{{ asset('js/viewImage.js') }}"></script>
    <script>
        $('.editButton').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#editModalButton').modal('show');


                }
            })
        });
    </script>
@endsection