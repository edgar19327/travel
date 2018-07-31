<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">View</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID:</label>

            <div class="col-sm-12">
                <input type="text" name="state_id" class="form-control" id="id_show" disabled="" value="{{$stateShow[0]->state_id}}">
            </div>
        </div>
@foreach($stateShow as $item)
        <div class="form-group">
            <label class="control-label col-sm-4" for="id">{{$item->language->translation}}</label>
            <div class="col-sm-12">

                <input type="text" class="form-control" id="id_show" disabled="" value="{{$item->name}}">
            </div>
        </div>
@endforeach
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('.modal-backdrop').remove(); $('#myModal').remove();">Close</button>
    </div>
</div>
    </div>
</div>

