<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_breast">Peitoral</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de breast" name="breast[]" multiple="multiple"
            style="width: 100%">
        @foreach($extraData['breast'] as $breast)
            <option value="{{$breast['id']}}">{{$breast['exercicio']}}</option>
        @endforeach
    </select>
</div>
