<form  action="{{route('placeCrud.store')}}"  method="Post"  enctype="multipart/form-data">
{{ csrf_field() }}
   {{ method_field('Post') }}
    <div class="modal fade " id="createModalPlace" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create </h4>
            </div>
            <div class="modal-body">

                @foreach($language as $lang)

                    <div class="form-group">
                        <label class="control-label col-sm-4" for="title_input">{{$lang->translation}}_Title</label>
                        <div class="col-sm-12">

                            <input type="text" name="title[{{$lang->id}}]" class="form-control" id="title_input" value="">

                        </div>


                    </div>



                @endforeach
                <hr>


                @foreach($language as $lang)
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="text_desc">{{$lang->translation}}_Description</label>
                        <div class="col-sm-12">

                                <textarea type="text" name="description[{{$lang->id}}]" class="form-control"
                                          id="text_desc"
                                          value="">
                                </textarea>
                        </div>

                    </div>

                @endforeach
                <hr>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="sel1">Select list:</label>
                        <select class="form-control" name='stateOption' id="sel1">

                            @foreach($states as $state)
                                <option id="state[{{$state->state_id}}]" value="{{ $state->state_id }}">{{$state->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>




                <div class="form-group">
                    <label class="control-label col-sm-4" for="map_input">Map Link</label>
                    <div class="col-sm-12">

                        <input type="text" name="map_link" class="form-control"
                               id="map_input" value="">
                    </div>


                </div>


                    <div class="file-field input-field col s12">
                        <h6>Main picture
                        </h6>
                        <input type="file" name="image_mane" id="image0" >
                    </div>
                    <div class="file-field input-field col s12">
                        <input type="file" name="image1" id="image1"  >
                    </div>
                    <div class="file-field input-field col s12">
                        <input type="file" name="image2" id="image2"  >
                    </div>
                        <div id="images-to-upload"></div>



                    <div class="modal-footer">
                    <button type="submit" class="btn btn-default " id="createPlaceMod">Create</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#createModalPlace').remove();">Close
                    </button>
                </div>

            </div>
        </div>
        </div>
    </div>
    </form>
<script>
    window.fileCollection = new Array();
    $('#images').on('change',function(e){
        var files = e.target.files;

        $.each(files, function(i, file){


            fileCollection.push(file);

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){

                var template =
                    '<div col-md-12>'+
                    '<img name="" src="'+e.target.result+'"> '+
                        '<select name="'+ fileCollection[0]["name"]+'" class="form-control" id="selectPosition">'+
                        '<option id="">asdassdasdasdasdd</option>'+
                        '<option id="">asdasd</option>'+
                        '</select>'+
                        '</div>';

                $('#images-to-upload').append(template);
            };

        });

    });
</script>