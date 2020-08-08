<div class="form-group">
    <label for="sex">Sexo</label>
    <select id="sex" class="form-control select2" data-placeholder="Selecione o Sexo" name="sex" style="width: 100%">

        @foreach($extraData['sex'] as $sex)
            @if(isset($data))
                @if($sex['id'] == $data['sex'])
                    <option value="{{$sex['id']}}" selected>{{$sex['description']}}</option>
                @else
                    <option value="{{$sex['id']}}">{{$sex['description']}}</option>
                @endif
            @else
            <option value="{{$sex['id']}}">{{$sex['description']}}</option>
            @endif
        @endforeach
    </select>
</div>

