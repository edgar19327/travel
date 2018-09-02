<div class="modal fade" id="sliderViewsModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Slider Place</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="id_slider">ID:</label>

                    <div class="col-sm-12">
                        <input type="text" name="slider_id" class="form-control" id="id_slider" disabled=""
                               value="{{$sliderView[0]->id}}
                                       ">
                    </div>
                </div>
                @foreach($sliderView[0]->slider_translates as $slider)

                    <div class="form-group">
                        <label class="control-label col-sm-12" for="id">{{$slider->language->translation}}
                            _Title:</label>

                        <div class="col-sm-12">
                            <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                                   value="{{$slider->title}}">
                        </div>
                    </div>
                @endforeach

                @foreach($sliderView[0]->slider_translates as $slider)

                    <div class="form-group">
                        <label class="control-label col-sm-12" for="id">{{$slider->language->translation}}
                            _Description:</label>

                        <div class="col-sm-12">
                            <textarea type="text" name="state_id" class="form-control" id="id_show" disabled="">
                                {{$slider->description}}
                            </textarea>
                        </div>
                    </div>
                    @endforeach

<div class="col-md-12">
    <img src="/{{$sliderView[0]->images[0]->path}}" style="width: 100%; height: 400px">
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

