<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="workout_id">Treino</label>
    <select class="multiple form-control select2" data-placeholder="Selecione os exercícios de bíceps" name="workout_id"
            style="width: 100%">
        @foreach($extraData['workout'] as $workout)
            <option value="{{$workout['id']}}">{{$workout['descricao']}}</option>
        @endforeach
    </select>
</div>

