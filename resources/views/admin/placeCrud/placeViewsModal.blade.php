<div class="modal fade" id="placeViewsModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Place</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label  for="id">ID:</label>

                        <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                               value="{{$place[0]->id}}">
                </div>

                @foreach($place[0]->place_translates as $testPlace)

                    <div class="form-group">
                        <label for="id">{{$testPlace->language->translation}}
                            _Title:</label>

                            <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                                   value="{{$testPlace->description}}">
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-12" for="state_desc">{{$testPlace->language->translation}}
                            _Description:</label>


                            <textarea class="form-control" rows="5"   name="state_desc"  id="state_desc" disabled="">{!! $testPlace->description !!}</textarea>
                    </div>
                @endforeach

                <div class="form-group">
                    <label for="id">State:</label>

                        <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                               value="{{$place[0]->state->state_translates[0]->name}}">
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="id">Location:</label>

                    <div class="col-sm-12">
                        <iframe style="width: 100%" src="{{$place[0]->location}}"></iframe>


                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="id">Rating:</label>

                    <div class="col-sm-12">

                        <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                               value="{{$ret}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-12 " for="title_input">Images</label>
                    <div class="row">
                        @foreach($place[0]->images as $image)
                            <div class="col-md-4">
                                <img style="width: 100%; height: 200px" src="/{{$image->path}}">
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#placeViewsModal').remove();">Close
                    </button>
                </div>
            </div>
        </div>
    </div>

