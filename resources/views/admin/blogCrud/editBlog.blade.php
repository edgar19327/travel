<form action="{{route('blogCrud.update', $blogId[0]->id)}}" method="Post" >
    {{ csrf_field() }}
    {{ method_field('Put') }}
    <div class="modal fade " id="editModalBlog" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit </h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="blog_id">ID</label>
                        <div class="col-sm-12">

                            <input type="text" name="blog_id" class="form-control"
                                   id="blog_id" value="{{$blogId[0]->id}}" readonly>
                        </div>
                    </div>

                    @foreach($blogId[0]->blog_translates as $blog_title)
                        <div class="form-group">
                            <label  for="title_blog">{{$blog_title->language->translation}}_Title</label>

                                <input type="text" name="title[{{$blog_title->language->id}}]" class="form-control"
                                       id="title_blog" value="{{$blog_title->title}}" >



                        </div>
                    @endforeach


                    @foreach($blogId[0]->blog_translates as $blog_desc)
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="state_desc">{{$blog_desc->language->translation}}_Description
                            </label>


                            <textarea class="form-control" rows="5" name="description[{{$blog_desc->language->id}}]">
                                                                {{$blog_desc->description}}

                            </textarea>
                        </div>

                    @endforeach



                        <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" name='placeOption' id="sel1">

                                @foreach($place as $date)
                                    <option id="state[{{$date->id}}]"
                                            value="{{$date->id }}">{{$date->place_translates[0]->title}}</option>
                                @endforeach
                            </select>

                        </div>





                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default " id="createBlog">Create
                        </button>

                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="$('.modal-backdrop').remove(); $('#editModalBlog').remove();">Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
{{--<script src="{{ asset('js/viewImage.js') }}"></script>--}}
