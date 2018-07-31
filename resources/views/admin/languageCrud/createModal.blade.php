<form action="{{route('languageCrud.store')}}" method="Post">
    {{ csrf_field() }}
    {{ method_field('Post') }}
    <div class="modal fade" id="createLangModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create </h4>
                </div>

                <div class="modal-body">


                    <div class="form-group">
                        <label class="control-label col-sm-4" for="code_input">Code</label>
                        <div class="col-sm-12">

                            <input type="text" name="codeLang" class="form-control" id="code_input" value="">
                        </div>

                    </div>



                    <div class="form-group">
                        <label class="control-label col-sm-4" for="translation_input">Translation</label>
                        <div class="col-sm-12">

                            <input type="text" name="translationLang" class="form-control" id="translation_input" value="">
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default " id="hello">Create</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="$('.modal-backdrop').remove(); $('#createModal').remove();">Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
