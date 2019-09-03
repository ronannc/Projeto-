<div class="form-group">
    <label for="company_id">Empresas</label>

    <select id="company_id" class="form-control select2" data-placeholder="Selecione a Empresa" name="company_id" style="width: 100%">
        @foreach($extraData['company'] as $company)
            @if(isset($data))
                @if($company['id'] == $data['company_id'])
                    <option value="{{$company['id']}}" selected>{{$company['name']}}</option>
                @endif
            @endif
            <option value="{{$company['id']}}">{{$company['name']}}</option>
        @endforeach
    </select>
</div>

