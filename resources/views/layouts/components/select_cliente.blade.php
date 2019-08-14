<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="id_cliente">Cliente</label>
    <select class="form-control select2" data-placeholder="Selecione o Cliente" name="id_cliente" style="width: 100%">
        @foreach($extraData['client'] as $cliente)
            @if(isset($data))
                @if($cliente['id'] == $data['id_cliente'])
                    <option value="{{$cliente['id']}}" selected>{{$cliente['nome']}}</option>
                @endif
            @endif
            <option value="{{$cliente['id']}}">{{$cliente['nome']}}</option>
        @endforeach
    </select>
</div>

