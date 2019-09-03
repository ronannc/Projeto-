<div class="form-group">
    <label for="city_id">Cidade</label>
    <select id="city_id" class="form-control select2" data-placeholder="Selecione a Cidade" name="city_id" style="width: 100%">

        @foreach($extraData['city'] as $city)
            @if(isset($data))
                @if($city['id'] == $data['city_id'])
                    <option value="{{$city['id']}}" selected>{{$city['name']}}</option>
                @endif
            @endif
            <option value="{{$city['id']}}">{{$city['name']}}</option>
        @endforeach
    </select>
</div>

