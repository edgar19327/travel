<!--editModalButton-->
{{--{{route('buttonUpdate', $place[0]->id )}}--}}
<form action="{{route('buttonUpdate', $buttons[0]->id )}}" method="Post" >
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal fade " id="editModalButton" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update </h4>
                </div>
                <div class="modal-body">


                    @foreach($languages as $key => $value)

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="title_input">{{$value->translation}}
                                _Title</label>
                            <div class="col-sm-12">
                                @if(!empty($buttons[0]->buttone_translates[$key]))


                                    <input type="text" name="title[{{$value->id}}]" class="form-control"
                                           id="title_input" value="{{$buttons[0]->buttone_translates[$key]->name}}">

                                    @else
                                    <input type="text" name="title[{{$value->id}}]" class="form-control"
                                           id="title_input" value="">
                                @endif
                            </div>


                        </div>

                    @endforeach


                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-default " id="createPlaceMod">Edit</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#editModalButton').remove();">Close
                    </button>
                </div>

            </div>
        </div>
    </div>
    </div>
</form>
<script src="{{ asset('js/viewImage.js') }}"></script>
