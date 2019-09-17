<div class="form-group">
    <label for="role_name">Permissaso</label>
    <select class="form-control select2"
            data-placeholder="Selecione a Permissao"
            name="role_name"
            style="width: 100%"
            id="role_name">
        @foreach($extraData['role'] as $role)
            @if(isset($data))
                @if($role['id'] == $data['role_id'])
                    <option value="{{$role['name']}}" selected>{{$role['name']}}</option>
                @endif
            @endif
            <option value="{{$role['name']}}">{{$role['name']}}</option>
        @endforeach
    </select>
</div>

