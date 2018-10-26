<form action="{{route('categoryCrud.update', $editDate[0]->id )}}" method="Post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal fade" id="editCategoryModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_cate">ID:</label>

                        <div class="col-sm-12">
                            <input type="text" name="id_cate" class="form-control" id="id_cate" disabled=""
                                   value="{{$editDate[0]->id}}">
                        </div>
                    </div>

                    @foreach($editDate[0]->category_translates as $date)

                        <div class="form-group">
                            <label class="control-label col-sm-4" for="edit_title">{{$date->language->translation}}
                                _Name:</label>
                            <div class="col-sm-12">
                                <input type="text" name="title[{{$date->language->id}}]" class="form-control" id="edit_title" value="{{$date->name}}">
                            </div>
                        </div>

                    @endforeach


                </div>
                <div class="modal-footer">
                    {{--<input type="hidden" name="_method" value="save">--}}


                    <button type="submit" class="btn btn-default " id="editCategory">Save</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#editLangModal').remove();">Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>
<script>

</script>