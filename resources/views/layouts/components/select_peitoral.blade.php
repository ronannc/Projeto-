<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_peitoral">Peitoral</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de peitoral" name="peitoral[]" multiple="multiple" style="width: 100%">
        @foreach($extraData['peitoral'] as $peitoral)
            <option value="{{$peitoral['id']}}">{{$peitoral['exercicio']}}</option>
        @endforeach
    </select>
</div>
