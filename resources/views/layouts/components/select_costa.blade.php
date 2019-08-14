<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_costa">Costas</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de costa" name="costa[]" multiple="multiple" style="width: 100%">
        @foreach($extraData['back'] as $costa)
            <option value="{{$costa['id']}}">{{$costa['exercicio']}}</option>
        @endforeach
    </select>
</div>
