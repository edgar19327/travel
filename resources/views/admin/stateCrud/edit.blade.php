<form  action="{{route('state.update', $stateShow[0]->state_id )}}"  method="Post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="id">ID:</label>

                    <div class="col-sm-12">
                        <input type="text" name="id" class="form-control" id="id_show"  readonly value="{{$stateShow[0]->state_id}}">
                    </div>
                </div>
                @foreach($stateShow as $item)
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="id">{{$item->language->translation}}</label>
                        <div class="col-sm-12">

                            <input type="text" name="translation[{{$item->language->id}}]"  class="form-control" id="id_show"  value="{{$item->name}}">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                {{--<input type="hidden" name="_method" value="save">--}}


                <button type="submit" class="btn btn-default " id="edit" >Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('.modal-backdrop').remove(); $('#viewModal').remove();">Close</button>
            </div>

        </div>
    </div>
</div>
</form>
<script>

</script>