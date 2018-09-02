<form action="{{route('userControl.update', $user[0]->id)}}" method="Post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('Put') }}
    <div class="modal fade " id="editModalUser" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name_user">Name:</label>
                        <div class="col-sm-12">
                            <input type="text" name="name_user" class="form-control" id="name_user"
                                   value="{{$user[0]->name}}">
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-sm-4" for="surname_user">Surname:</label>

                        <div class="col-sm-12">
                            <input type="text" name="surname_user" class="form-control" id="surname_user"
                                   value="{{$user[0]->surname}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="phone_user">Phone:</label>
                        <div class="col-sm-12">
                            <input type="text" name="phone_user" class="form-control" id="phone_user"
                                   value="{{$user[0]->numbere}}">
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-sm-4" for="gmail_user">Email:</label>

                        <div class="col-sm-12">
                            <input type="text" name="gmail_user" class="form-control" id="gmail_user"
                                   value="{{$user[0]->email}}">
                        </div>
                    </div>

                    @if(sizeof($user[0]->user_translates) == 0)

                        @else
                        @foreach($user[0]->user_translates as $userDesc)
                            <div class="form-group">
                                <label class="control-label col-sm-6" for="description_user_{{$userDesc->id}}">
                                   {{$userDesc->language->translation}}_Description:
                                </label>
                                <div class="col-sm-12">

                        <textarea type="text" name="description_user[{{$userDesc->id}}]" class="form-control"
                                  id="description_user_{{$userDesc->id}}">
{{$userDesc->description}}

                        </textarea>
                                </div>
                            </div>
                        @endforeach
                    @endif


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="sel1">Select Role:</label>
                            <select class="form-control" name='roleOption' id="sel1">

                                @foreach($role as $roleUser)
                                    <option id="role[{{$roleUser->id}}]"
                                            value="{{$roleUser->id }}">{{$roleUser->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>



                    <div class="form-group">

                        <label class="control-label col-sm-4" for="pass_user">Password:</label>

                        <div class="col-sm-12">
                            <input type="password" name="pass_user" class="form-control" id="pass_user"
                                   value="">
                        </div>
                    </div>


                    <div class="row center-block">
                        <div class="col-lg-offset-2 col-md-4" id="image_upload_4">
{{--                            <img src="/{{$user[0]->images[0]->path}}" style="width: 100%; height: 200px">--}}
                        </div>

                        <input type="file" class="col-md-4 center-block" name="image4[{{$user[0]->images[0]->id}}]" id="image4">

                    </div>
                    <br>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default " id="editUser">Create
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



