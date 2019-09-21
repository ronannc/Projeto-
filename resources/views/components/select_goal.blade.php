<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="goal_id">Metodos</label>
    <select class="multiple form-control select2"
            data-placeholder="Selecione os metodos de treino"
            name="goal_id"
            style="width: 100%"
            id="goal_id">
        @foreach($extraData['goal'] as $goal)
            <option value="{{$goal['id']}}">{{$goal['name']}}</option>
        @endforeach
    </select>
</div>

