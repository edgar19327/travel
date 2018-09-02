@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10" >
                                Slider
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('sliderCrud.create')}}" class="createSlider "
                                   data-toggle="modal" data-target="#createModalPlace"><i class="fa fa-plus "></i>
                                </a>

                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($errors)
                                <div class="error_blog">

                                </div>
                                <div class="row">

                                    @foreach ($errors->all() as $message)
                                        <div class="col error_div" style="color: red">{{ $message }}</div>
                                    @endforeach
                                </div>

                            @endif

                        @foreach($slider as $slid)
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <div class="caption">
                                            <div class="col-md-12 slider_icone">
                                                <div class="row">
{{----}}
                                                    <div class="col-md-6 text-right">
                                                        <a href="{{ route('sliderCrud.show',$slid->id) }}"
                                                           class="view" data-toggle="modal"
                                                           data-target="#sliderViewsModal"><i class="far fa-eye"></i></a>
                                                    </div>
                                                    <div class="col-md-6 text-left">
                                                        <form id="delete-form-{{$slid->id }}" method="post"
                                                              action="{{ route('sliderCrud.destroy',$slid->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
{{----}}
                                                            <a href="" onclick="
                                                                    if(confirm('Are you sure, You Want to delete this?'))
                                                                    {
                                                                    event.preventDefault();
                                                                    document.getElementById('delete-form-{{ $slid->id}}').submit();
                                                                    }
                                                                    else{
                                                                    event.preventDefault();
                                                                    }"> <i class="fas fa-trash-alt text-danger"></i></a>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <img src="/{{$slid->images[0]->path}}" style="width: 100%; height: 200px" alt="...">
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

    <script type="text/javascript">
        $('.view').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#sliderViewsModal').modal('show');


                }
            })
        });



        $('.createSlider').on('click', function () {
            var href = $(this).attr("href");
            $.ajax({
                type: 'get',
                url: href,
                success: function (data) {
                    $('.card-body').append(data);
                    $('#createSliderModal').modal('show');


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
        $( document ).ready(function() {
            $("[rel='tooltip']").tooltip();

            $('.thumbnail').hover(
                function(){
                    $(this).find('.caption').slideDown(250); //.fadeIn(250)
                },
                function(){
                    $(this).find('.caption').slideUp(250); //.fadeOut(205)
                }
            );
        });
    </script>

@endsection