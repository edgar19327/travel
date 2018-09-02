<form action="{{route('userControl.store')}}" method="Post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('Post') }}
<div class="modal fade " id="createModalUser" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create </h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name_user">Name:</label>
                    <input type="text"  name="name_user" class="form-control" id="name_user">
                </div>

                <div class="form-group">
                    <label for="surname_user">Surname:</label>
                    <input type="text" name="surname_user" class="form-control" id="surname_user">
                </div>

                <div class="form-group">
                    <label for="phone_user">Phone:</label>
                    <input type="text"  name="phone_user" class="form-control" id="phone_user">
                </div>

                <div class="form-group">
                    <label for="gmail_user">Email:</label>
                    <input type="text"  name="gmail_user" class="form-control" id="gmail_user">
                </div>




                @foreach($lang as $language)
                    <div class="form-group">
                        <label for="description_user_{{$language->id}}">{{$language->translation}}_Description::</label>
                        <textarea class="form-control" name="description_user[{{$language->id}}]" rows="5"
                                  id="description_user_{{$language->id}}"></textarea>
                    </div>

                @endforeach

                <div class="form-group">
                    <label for="sel1">Select  Role (select one):</label>
                    <select class="form-control" name="role_id" id="sel1">
                        @foreach($role as $roleUser)
                            <option id="role[{{$roleUser->id}}]"
                                    value="{{$roleUser->id }}" >{{$roleUser->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">

                    <label  for="pass_user">Password:</label>


                    <input type="password" name="pass_user" class="form-control" id="pass_user"
                           value="">

                </div>


                <div class="row center-block">
                    <div class="col-md-4" id="image_upload_4"></div>

                    <input type="file" class="col-md-4 center-block" name="image4" id="image4">

                </div>
                <br>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-default " id="createBlog">Create
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#createModalUser').remove();">Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
</form>
<script src="{{ asset('js/viewImage.js') }}"></script>



