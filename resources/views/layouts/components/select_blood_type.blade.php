<div class="form-group">
    <label for="blood_type">Tipo Sanguineo</label>
    <select id="blood_type" class="form-control select2" data-placeholder="Selecione a Cidade" name="blood_type" style="width: 100%">

        @foreach($extraData['blood_type'] as $blood_type)
            @if(isset($data))
                @if($blood_type == $data['blood_type'])
                    <option value="{{$blood_type}}" selected>{{$blood_type}}</option>
                @endif
            @endif
            <option value="{{$blood_type}}">{{$blood_type}}</option>
        @endforeach
    </select>
</div>

