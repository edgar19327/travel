@extends('layouts.app')

@section('content')
    <form action="{{route('profileUpdate', $profile[0]->id)}}" method="Post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('Put') }}
    <div class="container bootstrap snippet" id="profileVews">

        <div class="row">

            <div class="col-sm-3"><!--left col-->
                {{--{{$profile}}--}}
                <div class="text-center">
                    <img src="/{{$profile[0]->images[0]->path}}" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file"  name="image4[{{$profile[0]->images[0]->id}}]" class="text-center center-block file-upload">
                </div>
                </hr><br>


            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>

                </ul>


                <div class="tab-content">
                    @if($errors)
                        <div class="error_blog">

                        </div>
                        <div class="row">

                            @foreach ($errors->all() as $message)
                                <div class="col error_div" style="color: red">{{ $message }}</div>
                            @endforeach
                        </div>

                    @endif
                    <div class="tab-pane active" id="home">
                        <hr>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>First name</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                           placeholder="first name" value="{{$profile[0]->name}}"
                                           title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name"><h4>Last name</h4></label>
                                    <input type="text" class="form-control" name="last_name" id="last_name"
                                           placeholder="last name"
                                           title="enter your last name if any." value="{{$profile[0]->surname}}">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone"><h4>Phone</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                           placeholder="enter phone"
                                           title="enter your phone number if any." value="{{$profile[0]->numbere}}">
                                </div>
                            </div>


                            <div class="form-group" >

                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="you@email.com"
                                           title="enter your email." value="{{$profile[0]->email}}">
                                </div>
                            </div>
                            @foreach($profile[0]->user_translates as $description)
                                <div class="form-group" >
                                    <label for="comment">{{$description->language->translation}}_Description</label>
                                    <textarea class="form-control" rows="5" name="desc[{{$description->language->id}}]" id="comment">{{$description->description}}

</textarea>
                                </div>
                            @endforeach


                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Save
                                    </button>
                                </div>
                            </div>

                        <hr>

                    </div><!--/tab-pane-->

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    </form>
@endsection