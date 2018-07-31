<form  action="{{route('state.store')}}"  method="Post">
    {{ csrf_field() }}
    {{ method_field('Post') }}
    <div class="modal fade" id="createModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create </h4>
                </div>

                <div class="modal-body">
                    @foreach($leng as $language)
                    <div class="form-group">
                    <label class="control-label col-sm-4" for="id">{{$language->translation}}_Title</label>
                    <div class="col-sm-12">

                        <input type="text" name="translation[{{$language->id}}]"  class="form-control" id="create_input"  value="">
                    </div>

                </div>
                        @endforeach
                </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default " id="hello" >Create</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('.modal-backdrop').remove(); $('#createModal').remove();">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>
