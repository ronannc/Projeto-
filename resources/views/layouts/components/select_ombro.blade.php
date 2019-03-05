<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_ombro">Ombro</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de ombro" name="ombro[]" multiple="multiple" style="width: 100%">
        @foreach($extraData['ombro'] as $ombro)
            <option value="{{$ombro['id']}}">{{$ombro['exercicio']}}</option>
        @endforeach
    </select>
</div>
