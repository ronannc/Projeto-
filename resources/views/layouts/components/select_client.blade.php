<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="client_ide">Cliente</label>
    <select class="form-control select2" data-placeholder="Selecione o Cliente" name="client_ide" style="width: 100%">
        @foreach($extraData['client'] as $cliente)
            @if(isset($data))
                @if($cliente['id'] == $data['client_ide'])
                    <option value="{{$cliente['id']}}" selected>{{$cliente['nome']}}</option>
                @endif
            @endif
            <option value="{{$cliente['id']}}">{{$cliente['nome']}}</option>
        @endforeach
    </select>
</div>

