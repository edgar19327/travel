<form action="{{route('categoryCrud.store')}}" method="Post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('Post') }}
    <div class="modal fade " id="createCatModal" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create </h4>
                </div>
                <div class="modal-body">

                    @foreach($language as $lang)
                        <div class="form-group">
                            <label  for="title_blog">{{$lang->translation}}_Title</label>

                            <input type="text" name="title[{{$lang->id}}]" class="form-control"
                                   id="title_blog" value="">



                        </div>
                    @endforeach



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default " id="createBlog">Create
                        </button>

                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="$('.modal-backdrop').remove(); $('#createModalBlog').remove();">Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
