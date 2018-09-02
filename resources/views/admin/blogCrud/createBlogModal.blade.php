<form action="{{route('blogCrud.store')}}" method="Post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('Post') }}
    <div class="modal fade " id="createModalBlog" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create </h4>
                </div>
                <div class="modal-body">


                    @foreach($lang as $language)
                        <div class="form-group">
                            <label  for="title_blog">{{$language->translation}}_Title</label>

                                <input type="text" name="title[{{$language->id}}]" class="form-control"
                                       id="title_blog" value="">



                        </div>
                    @endforeach

                    @foreach($lang as $language)
                        <div class="form-group">
                            <label for="description_blog">{{$language->translation}}_Description</label>
                            <textarea class="form-control" name="description_user[{{$language->id}}]" rows="5"
                                      id="description_blog"></textarea>


                        </div>
                    @endforeach


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" name='placeOption' id="sel1">

                                @foreach($places as $place)
                                    <option id="state[{{$place->id}}]"
                                            value="{{$place->id }}">{{$place->place_translates[0]->title}}</option>
                                @endforeach
                            </select>

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
</form>
<script src="{{ asset('js/viewImage.js') }}"></script>
