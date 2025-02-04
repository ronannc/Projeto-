<div class="form-group">
    <label for="client_id">Cliente</label>
    <select class="form-control select2"
            data-placeholder="Selecione o Cliente"
            id="client_id"
            name="client_id"
            style="width: 100%">
        @foreach($extraData['client'] as $client)
            @if(isset($data))
                @if($client['id'] == $data['client_id'])
                    <option value="{{$client['id']}}" selected>{{$client['name']}}</option>
                @endif
            @else
                <option value="{{$client['id']}}">{{$client['name']}}</option>
            @endif
        @endforeach
    </select>
</div>

