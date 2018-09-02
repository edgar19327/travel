<div class="modal fade" id="userViewsModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="description_user">Image:</label>
                                <div class="col-sm-6">
                                    <img src="/{{$user[0]->images[0]->path}}" style="width: 100%; height: 200px">
                                </div>

                            </div>


                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="id">ID:</label>

                                <div class="col-sm-12">
                                    <input type="text" name="state_id" class="form-control" id="id_show" disabled=""
                                           value="{{$user[0]->id}}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-4" for="name_user">Name:</label>

                                <div class="col-sm-12">
                                    <input type="text" name="name_user" class="form-control" id="name_user" disabled=""
                                           value="{{$user[0]->name}}">
                                </div>
                            </div>


                            <div class="form-group">

                                <label class="control-label col-sm-4" for="surname_user">Surname:</label>

                                <div class="col-sm-12">
                                    <input type="text" name="surname_user" class="form-control" id="surname_user"
                                           disabled=""
                                           value="{{$user[0]->surname}}">
                                </div>
                            </div>
                        </div>
                    </div>


                @if (sizeof($user[0]->user_translates) == 0)


                @else
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description_user">Description:</label>
                        <div class="col-sm-12">

                            <textarea type="text" name="description_user" class="form-control" id="description_user"
                                      disabled="">
                            {{$user[0]->user_translates[0]->description}}

                        </textarea>
                        </div>
                    </div>
                @endif


                {{--                {{$user[0]->user_translates[0]->description}}--}}


                <div class="form-group">
                    <label class="control-label col-sm-2" for="phone_user">Phone:</label>

                    <div class="col-sm-12">
                        <input type="text" name="phone_user" class="form-control" id="phone_user" disabled=""
                               value="{{$user[0]->numbere}}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="email_user">Email:</label>

                    <div class="col-sm-12">
                        <input type="text" name="email_user" class="form-control" id="email_user" disabled=""
                               value="{{$user[0]->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email_user">Role:</label>

                    <div class="col-sm-12">
                        <input type="text" name="role_user" class="form-control" id="role_user" disabled=""
                               value="{{$user[0]->role->name}}">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"
                        onclick="$('.modal-backdrop').remove(); $('#userViewsModal').remove();">Close
                </button>
            </div>
        </div>
    </div>
</div>


