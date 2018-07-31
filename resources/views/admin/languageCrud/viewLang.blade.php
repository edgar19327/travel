<div class="modal fade" id="viewLanguageModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="id">ID:</label>

                    <div class="col-sm-12">
                        <input type="text" name="state_id" class="form-control" id="id_show" disabled="" value="{{$showLang[0]->id}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-4" for="id">Code:</label>

                    <div class="col-sm-12">
                        <input type="text" name="state_id" class="form-control" id="id_show" disabled="" value="{{$showLang[0]->code}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-4" for="id">Translation:</label>

                    <div class="col-sm-12">
                        <input type="text" name="state_id" class="form-control" id="id_show" disabled="" value="{{$showLang[0]->translation}}">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('.modal-backdrop').remove(); $('#viewLanguageModal').remove();">Close</button>
            </div>
        </div>
    </div>
</div>

