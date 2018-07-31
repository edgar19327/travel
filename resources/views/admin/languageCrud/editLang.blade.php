<form  action="{{route('languageCrud.update', $editLang[0]->id )}}"  method="Post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal fade" id="editLangModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_lang">ID:</label>

                        <div class="col-sm-12">
                            <input type="text" name="lang_id" class="form-control" id="id_lang" disabled="" value="{{$editLang[0]->id}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-4" for="lang_code">Code:</label>

                        <div class="col-sm-12">
                            <input type="text" name="lang_code" class="form-control" id="lang_code"  value="{{$editLang[0]->code}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-4" for="lang_translation">Translation:</label>

                        <div class="col-sm-12">
                            <input type="text" name="lang_translation" class="form-control" id="lang_translation"  value="{{$editLang[0]->translation}}">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    {{--<input type="hidden" name="_method" value="save">--}}


                    <button type="submit" class="btn btn-default " id="editLang" >Save</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('.modal-backdrop').remove(); $('#editLangModal').remove();">Close</button>
                </div>

            </div>
        </div>
    </div>
</form>
<script>

</script>