<form action="{{route('menuCrud.update', $menuEdit[0]->id)}}" method="Post">
{{ csrf_field() }}
{{ method_field('Put') }}
<div class="modal fade" id="editMenuModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Menu </h4>
            </div>

            <div class="modal-body">
                @foreach($menuEdit[0]->menu_parents as $edit)
                    <div class="form-group">
                        <label for="menu_name">{{$edit->language->translation}}_Name</label>
                        <input type="text" class="form-control" id="menu_name" name="menu_name[{{$edit->language->id}}]" value="{{$edit->name}}" >

                    </div>

                @endforeach
                <div class="form-group">
                    <label for="menu_url">Url</label>

                    <input type="text" name="url" class="form-control" id="menu_url" value="{{$menuEdit[0]->menu_parents[0]->url}}" >

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
                    <button type="submit" class="btn btn-default " id="menuEdit">Edit</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#editMenuModal').remove();">Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
</form>
