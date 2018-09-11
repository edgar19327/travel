
<div class="modal fade" id="viewMenuModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create </h4>
            </div>

            <div class="modal-body">
                @foreach($menuview[0]->menu_parents as $menu)
                    <div class="form-group">
                        <label for="menu_name">{{$menu->language->translation}}_Name</label>
                        <input type="text" class="form-control" id="menu_name" value="{{$menu->name}}" readonly>

                    </div>

                @endforeach
                <div class="form-group">
                    <label for="menu_url">Url</label>

                    <input type="text" name="url" class="form-control" id="menu_url" value="{{$menu->url}}" readonly>

                </div>

                <div class="form-group">
                    <label for="menu_url">Parent</label>

                    <input type="text" name="url" class="form-control" id="menu_url"
                           value="{{$menu['menu']['menu_parents'][0]['name']}}" readonly>


                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-default " id="hello">Create</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"
                            onclick="$('.modal-backdrop').remove(); $('#viewMenuModal').remove();">Close
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
