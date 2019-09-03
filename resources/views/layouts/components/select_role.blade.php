<div class="form-group">
    <label for="role_id">Permissaso</label>
    <select class="form-control select2"
            data-placeholder="Selecione a Permissao"
            name="role_id"
            style="width: 100%"
            id="role_id">
        @foreach($extraData['role'] as $role)
            @if(isset($data))
                @if($role['id'] == $data['role_id'])
                    <option value="{{$role['id']}}" selected>{{$role['name']}}</option>
                @endif
            @endif
            <option value="{{$role['id']}}">{{$role['name']}}</option>
        @endforeach
    </select>
</div>

