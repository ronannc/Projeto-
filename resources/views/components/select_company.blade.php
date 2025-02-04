<div class="form-group">
    <label for="company_id">Empresas</label>
    <select class="form-control select2"
            data-placeholder="Selecione a Empresa"
            id="company_id"
            name="company_id"
            style="width: 100%">
        @foreach($extraData['company'] as $company)
            @if(isset($data))
                @if($company['id'] == $data['company_id'])
                    <option value="{{$company['id']}}" selected>{{$company['name']}}</option>
                @endif
            @else
            <option value="{{$company['id']}}">{{$company['name']}}</option>
            @endif
        @endforeach
    </select>
</div>

