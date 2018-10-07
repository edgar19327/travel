<form action="{{route('placeCrud.update', $place[0]->id )}}" method="Post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal fade " id="editModalPlace" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create </h4>
                </div>
                <div class="modal-body">


                    @foreach($place[0]->place_translates as $plac )

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="title_input">{{$plac->language->translation}}
                                _Title</label>
                            <div class="col-sm-12">

                                <input type="text" name="title[{{$plac->language->id}}]" class="form-control"
                                       id="title_input" value="{{$plac->title}}">

                            </div>


                        </div>
                    @endforeach


                    @foreach($place[0]->place_translates as $plac )

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="title_input">{{$plac->language->translation}}
                                _Description</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="description[{{$plac->language->id}}]" rows="5"
                                          id="comment">
                                    {{$plac->description}}

                                </textarea>


                            </div>


                        </div>
                    @endforeach


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="sel1">State list:</label>
                            <select class="form-control" name='stateOption' id="sel1">

                                @foreach($stats as $state)
                                    <option id="state[{{$state->id}}]"
                                            value="{{ $state->id }}">{{$state->state_translates[0]->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="sel1">Select Category:</label>
                            <select class="form-control" name='catOption' id="sel1">
                                @foreach($category as $cat)
                                    <option id="category[{{$cat->id}}]"
                                            value="{{ $cat->id }}">{{$cat->category_translates[0]->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="map_input">Map Link</label>
                        <div class="col-sm-12">

                            <input type="text" name="map_link" class="form-control"
                                   id="map_input" value="{{$place[0]->location}}">
                        </div>


                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-4 col-md-4 text-center" for="map_input">Main Images</label>
                        <label class="control-label col-sm-7 col-md-7 text-center" for="map_input"> Secondary
                            Images</label>
                        <div class="row images-to-upload text-center">


                            @foreach($place[0]->images as $imageAll)
                                <div class="col-md-4" id="image_upload_{{$loop->iteration }}">
                                    <img src="/{{$imageAll->path}}" style="width: 100%; height: 200px">

                                </div>

                            @endforeach
                        </div>

                        <div class="row center-block">
                            {{$place[0]->images}}
                            @foreach($place[0]->images as $imageAll)
                                <input type="file" class="col-md-4 center-block"
                                       name="image_{{$imageAll->type}}[{{$imageAll->id}}]"
                                       id="image{{$loop->iteration }}">

                            @endforeach

                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default " id="createPlaceMod">Create</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="$('.modal-backdrop').remove(); $('#editModalPlace').remove();">Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{ asset('js/viewImage.js') }}"></script>
