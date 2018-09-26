<form action="{{route('placeCrud.store')}}" method="Post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('Post') }}
    <div class="modal fade " id="createModalPlace" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create </h4>
                </div>
                <div class="modal-body">
                    @foreach($language as $lang)

                        <div class="form-group">
                            <label  for="title_input">{{$lang->translation}}_Title</label>


                                <input type="text" name="title[{{$lang->id}}]" class="form-control" id="title_input"
                                       value="">

                        </div>
                    @endforeach
                    <hr>


                    @foreach($language as $lang)
                        <div class="form-group">
                            <label  for="description_user_1">{{$lang->translation}}_Description</label>
                            <textarea class="form-control" name="description[{{$lang->id}}]" rows="5" id="description_user_1"></textarea>


                        </div>

                    @endforeach
                    <hr>
                        <div class="form-group">
                            <label for="sel1">State list:</label>
                            <select class="form-control" name='stateOption' id="sel1">

                                @foreach($states as $state)
                                    <option id="state[{{$state->state_id}}]"
                                            value="{{ $state->state_id }}">{{$state->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="sel1">Select Category:</label>
                            <select class="form-control" name='catOption' id="sel1">
                                @foreach($category as $cat)
                                    <option id="category[{{$cat->id}}]"
                                            value="{{ $cat->id }}">{{$cat->category_translates[0]->name}}</option>
                                @endforeach
                            </select>

                        </div>



                    <div class="form-group">
                        <label class="control-label col-sm-4" for="map_input">Map Link</label>

                            <input type="text" name="map_link" class="form-control"
                                   id="map_input" value="">


                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-4 col-md-4 text-center" for="map_input">Images</label>
                        <label class="control-label col-sm-7 col-md-7 text-center" for="map_input"> Secondary Images</label>

                        <div class="row  images-to-upload  text-center">
                            <div class="col-md-4" id="image_upload_1"></div>
                            <div class="col-md-4" id="image_upload_2"></div>
                            <div class="col-md-4" id="image_upload_3"></div>
                        </div>
                        <div class="row center-block">
                            <input type="file" class="col-md-4 center-block" name="image_mane" id="image1">

                            <input type="file" class="col-md-4 center-block" name="image1" id="image2">

                            <input type="file" class="col-md-4 center-block" name="image2" id="image3">

                        </div>


                    </div>
                    <div id="images-to-upload"></div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default " id="createPlaceMod"
                        >Create
                        </button>

                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="$('.modal-backdrop').remove(); $('#createModalPlace').remove();">Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{ asset('js/viewImage.js') }}" ></script>
