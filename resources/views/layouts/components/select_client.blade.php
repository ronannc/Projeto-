<div class="form-group">
    <label for="client_id">Cliente</label>
    <select class="form-control select2"
            data-placeholder="Selecione o Cliente"
            name="client_id"
            style="width: 100%"
            id="client_id">
        @foreach($extraData['client'] as $client)
            @if(isset($data))
                @if($client['id'] == $data['client_id'])
                    <option value="{{$client['id']}}" selected>{{$client['name']}}</option>
                @endif
            @endif
            <option value="{{$client['id']}}">{{$client['name']}}</option>
        @endforeach
    </select>
</div>

