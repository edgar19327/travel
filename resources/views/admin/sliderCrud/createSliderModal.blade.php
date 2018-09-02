<form action="{{route('sliderCrud.store')}}" method="Post" enctype="multipart/form-data">
  {{ csrf_field() }}
 {{ method_field('Post') }}
<div class="modal fade " id="createSliderModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                Create
            </div>
            <div class="modal-body">

                @foreach($language as $lang)

                    <div class="form-group">
                        <label  for="title_input{{$lang->id}}">{{$lang->translation}}_Title</label>


                            <input type="text" name="title[{{$lang->id}}]" class="form-control"
                                   id="title_input{{$lang->id}}"
                                   value="">


                    </div>

                @endforeach


                @foreach($language as $lang)
                    <div class="form-group">
                        <label  for="text_desc{{$lang->id}}">{{$lang->translation}}_Description</label>

                        <textarea class="form-control" name="description[{{$lang->id}}]" rows="5" id="text_desc{{$lang->id}}"></textarea>


                    </div>

                @endforeach


                <div class="row center-block">
                    <div class="col-md-4" id="image_upload_4"></div>

                    <input type="file" class="col-md-4 center-block" name="image4" id="image4">

                </div><br>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-default " id="createPlaceMod">Create</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#createSliderModal').remove();">Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
</form>
<script src="{{ asset('js/viewImage.js') }}"></script>

