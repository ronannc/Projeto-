<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="method_id">Metodos</label>
    <select class="multiple form-control select2"
            data-placeholder="Selecione os metodos de treino"
            name="method_id"
            style="width: 100%"
            id="method_id">
        @foreach($extraData['method'] as $method)
            <option value="{{$method['id']}}">{{$method['name']}}</option>
        @endforeach
    </select>
</div>

