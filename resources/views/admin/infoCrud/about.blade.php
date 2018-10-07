@extends('layouts.adminMenu')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">Content About
                            </div>


                        </div>
                    </div>
                    <div class="card-body">

                        {{--@if($errors)--}}
                        {{--<div class="error_blog">--}}

                        {{--</div>--}}
                        {{--<div class="row">--}}

                        {{--@foreach ($errors->all() as $message)--}}
                        {{--<div class="col error_div" style="color: red">{{ $message }}</div>--}}
                        {{--@endforeach--}}
                        {{--</div>--}}

                        {{--@endif--}}



                        @isset($language)
                            <form action="{{route('aboutStore')}}" method="Post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('Post') }}
                                <div class="row pull-center">

                                    @foreach($language as $lang)
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="title_blog">{{$lang->translation}}_Title</label>

                                                <input type="text" name="title[{{$lang->id}}]" class="form-control"
                                                       id="title_blog" value="">


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach($language as $desc)
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="description_guide">{{$desc->translation}}
                                                    _Description</label>
                                                <textarea class="form-control" name="description[{{$desc->id}}]"
                                                          rows="5" id="description_guide"></textarea>


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4 col-md-4 text-center" for="map_input"> About Images</label>

                                    <div class="row  images-to-upload  text-center">
                                        <div class="col-md-4" id="image_upload_about"></div>

                                    </div>
                                    <div class="row center-block">
                                        <div class="col-md-4 center-block">
                                        <input type="file"  name="image_about" id="image_about">
                                        </div>
                                        <div class="col-md-8 text-right">
                                        <button type="submit" class="btn btn-default " id="createguide">Create</button>
                                        </div>

                                    </div>


                                </div>
                            </form>
                        @endisset
                        @isset($about)


                            <form action="{{route('updateAbout', $about[0]->about_id)}}" method="Post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row pull-center">
                                    @foreach($about as $value)
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="title_guide">{{$value->language->translation}}_Title</label>

                                                <input type="text" name="title[{{$value->language->id}}]" class="form-control"
                                                       id="title_guide" value="{{$value->title}}">


                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    @foreach($about  as $desc)

                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="description_guide_update">{{$desc->language->translation}}
                                                    _Description</label>
                                                <textarea class="form-control" name="desc[{{$desc->language->id}}]"
                                                          rows="5" id="description_guide_update">{{$desc->description}}
</textarea>


                                            </div>
                                        </div>


                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4 col-md-4 text-center" for="map_input"> About Images</label>

                                    <div class="row  images-to-upload  text-center">
                                        <div class="col-md-4" id="image_upload_about">
                                            <img src="/{{$about[0]->about->images[0]->path}} " alt="" style="width: 100%; height: 200px">
                                        </div>

                                    </div>
                                    <div class="row center-block">
                                        {{--@foreach($place[0]->images as $imageAll)--}}
                                            {{--<input type="file" class="col-md-4 center-block"--}}
                                                   {{--name="image_{{$imageAll->type}}[{{$imageAll->id}}]"--}}
                                                   {{--id="image{{$loop->iteration }}">--}}

                                        {{--@endforeach--}}
                                        <div class="col-md-4 center-block">
                                            <input type="file"  name="image_about[{{$about[0]->about->images[0]->id}}]" id="image_about">
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <button type="submit" class="btn btn-default " id="createguide">Edit</button>
                                        </div>

                                    </div>


                                </div>
                            </form>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script src="{{ asset('js/viewImage.js') }}" ></script>

@endsection