<div class="modal fade" id="viewCategoryModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="id">ID:</label>

                    <div class="col-sm-12">
                        <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                               value="{{$view[0]->id}}">
                    </div>
                </div>

                @foreach($view[0]->category_translates as $category)
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="id">{{$category->language->translation}}_Name:</label>
                        <div class="col-sm-12">
                            <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                                   value="{{$category->name}}">
                        </div>
                    </div>
                @endforeach



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                        onclick="$('.modal-backdrop').remove(); $('#viewCategoryModal').remove();">Close
                </button>
            </div>
        </div>
    </div>
</div>

