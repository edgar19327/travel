
    <div class="modal fade " id="blogViewsModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View </h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="blog_id">ID</label>
                        <div class="col-sm-12">

                            <input type="text" name="blog_id" class="form-control"
                                   id="blog_id" value="{{$blog[0]->id}}" readonly>
                        </div>
                    </div>

                    @foreach($blog[0]->blog_translates as $blog_trans)
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="title_blog">{{$blog_trans->language->translation}}_Title</label>
                            <div class="col-sm-12">

                                <input type="text" name="title" class="form-control"
                                       id="title_blog" value="{{$blog_trans->title}}" readonly>
                            </div>


                        </div>
                    @endforeach


                    @foreach($blog[0]->blog_translates as $blog_trans)
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="title_blog">{{$blog_trans->language->translation}}_Description</label>
                            <div class="col-sm-12">

                                <textarea type="text" name="title" class="form-control"
                                       id="title_blog"  readonly>
                                    {{$blog_trans->description}}
                                </textarea>
                            </div>


                        </div>
                    @endforeach




                    <div class="form-group">
                        <label class="control-label col-sm-4" for="place_blog">Place</label>
                        <div class="col-sm-12">
                            <input type="text" name="title" class="form-control"
                            id="title_blog" value=" {{$blog[0]->blog_translates[0]->place->place_translates[0]->title}}" readonly >
                        </div>


                    </div>


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
<script src="{{ asset('js/viewImage.js') }}"></script>
