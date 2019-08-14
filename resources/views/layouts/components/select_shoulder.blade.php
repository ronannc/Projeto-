<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_shoulder">Ombro</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de shoulder" name="shoulder[]"
            multiple="multiple" style="width: 100%">
        @foreach($extraData['shoulder'] as $shoulder)
            <option value="{{$shoulder['id']}}">{{$shoulder['exercicio']}}</option>
        @endforeach
    </select>
</div>