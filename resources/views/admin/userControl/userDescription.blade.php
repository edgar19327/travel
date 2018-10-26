

@foreach($lang as $language)
    <div class="form-group">
        <label for="description_user_{{$language->id}}">{{$language->translation}}_Description::</label>
        <textarea class="form-control" name="description_user[{{$language->id}}]" rows="5"
                  id="description_user_{{$language->id}}"></textarea>
    </div>

@endforeach
@foreach($states as $state)

    <div class="checkbox">
        <label><input type="checkbox" name="states[{{$state->id}}]" >{{$state->state_translates[0]->name}}</label>
    </div>

@endforeach