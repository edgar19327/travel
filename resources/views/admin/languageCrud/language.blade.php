@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">Languages

                            </div>
                            <div class="col-md-2 text-right">
                                <a href="{{ route('languageCrud.create')}}" class="createLang"
                                   data-toggle="modal" data-target="#createLangModal"><i class="fa fa-plus "></i>
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
                                <th scope="col">Code</th>
                                <th scope="col">Translation</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="state_table">

                            @foreach($languages as $lang)
                                <tr>
                                    <th scope="row" class="id">{{$lang->id}}</th>
                                    <td>{{$lang->code}}</td>
                                    <td>{{$lang->translation}}</td>

                                    <td class="text-center">
                                        <div class="col-md-3 float-right">

                                            <div class="row">

                                                <div class="col-md-4"><a href="{{ route('languageCrud.show',$lang->id) }}" class="viewLang" data-toggle="modal" data-target="#viewLanguageModal"><i class="far fa-eye"></i></a></div>
                                                <div class="col-md-4"><a href="{{ route('languageCrud.edit',$lang->id) }}" class="editLang" data-toggle="modal" data-target="#editLangModal"><i class="fas fa-pencil-alt text-success"></i></a></div>
                                                <div class="col-md-4">
                                                    <form id="delete-form-{{ $lang->id }}" method="post" action="{{ route('languageCrud.destroy',$lang->id) }}" >
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <a href="" onclick="
                                                                if(confirm('Are you sure, You Want to delete this?'))
                                                                {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $lang->id}}').submit();
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

                        <div class="col-md-12">
                            {{$languages->links()}}

                        </div>
                        <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
        $('.viewLang').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                async: false,
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#viewLanguageModal').modal('show');


                }
            })
        });


        $('.editLang').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#editLangModal').modal('show');


                }
            })
        });

        $('form#editLang').submit( function (event) {
            event.preventDefault();
            var formDate = new FormData($(this)[0]);

            $.ajax({
                type:'PUT',
                date:formDate,
                success: function (data) {



                    alert(data);
                },
                error:function () {
                    alert("Error")
                }
            })
        });

        $('.createLang').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#createLangModal').modal('show');


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