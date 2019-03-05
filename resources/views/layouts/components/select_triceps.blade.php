<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_triceps">Triceps</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de triceps" name="triceps[]" multiple="multiple" style="width: 100%">
        @foreach($extraData['triceps'] as $triceps)
            <option value="{{$triceps['id']}}">{{$triceps['exercicio']}}</option>
        @endforeach
    </select>
</div>
