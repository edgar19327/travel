<form action="{{route('menuCrud.store')}}" method="Post">
{{ csrf_field() }}
{{ method_field('Post') }}
<div class="modal fade" id="createMenuModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create </h4>
            </div>

            <div class="modal-body">
                @foreach($language as $lang)
                    <div class="form-group">
                        <label  for="menu_name">{{$lang->translation}}_Name</label>

                        <input type="text" name="menuNameTrans[{{$lang->id}}]" class="form-control" id="menu_name" value="">

                    </div>

                @endforeach
                    <div class="form-group">
                        <label  for="menu_url">Url</label>

                        <input type="text" name="url" class="form-control" id="menu_url" value="">

                    </div>
                @if(!empty($menu))

                    <div class="form-group">
                        <label for="sel1">Parent list:</label>
                        <select class="form-control" name='menuOption' id="sel1">
                            <option value="">No Parent</option>

                            @foreach($menu as $menus)
                                <option id="state[{{$menus->id}}]"
                                        value="{{ $menus->id }}">{{$menus->menu_parents[0]->name}}</option>
                            @endforeach
                        </select>

                    </div>
                @endif





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
