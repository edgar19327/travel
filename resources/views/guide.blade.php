@extends('layouts.app')

@section('content')
    <section class="guideViewSection">
        <div class="container">
            <div class="row">

                <div class=" col-md-10 col-sm-10 col-md-offset-1">
                    <!-- resumt -->
                    <div class="panel panel-default">
                        <div class="panel-heading resume-heading">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-xs-12 col-sm-4 col-md-4">
                                        <figure class="centered">
                                            <img class="img-circle img-responsive" alt=""
                                                 src="/{{$guide[0]->images[0]->path}}" style="width: 180px; height: 180px">
                                        </figure>

                                    </div>
                                    <div class="col-xs-12 col-sm-8">
                                        <ul class="list-group">
                                            <li class="list-group-item">{{$guide[0]->name}}</li>
                                            <li class="list-group-item">{{$guide[0]->surname}}</li>
                                            <li class="list-group-item"><i class="fa fa-phone"></i>+{{$guide[0]->numbere}}</li>
                                            <li class="list-group-item"><i class="fa fa-envelope"></i> {{$guide[0]->email}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bs-callout bs-callout-danger">
                            <h4>Description</h4>
                            <p>
                              {{$guide[0]->user_translates[0]->description}}

                            </p>
                        </div>

                    </div>
                </div>
                <!-- resume -->

            </div>
        </div>
        </div>
    </section>
@endsection