<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_lower_member">Membro Inferior</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de lower_member" name="lower_member[]"
            multiple="multiple" style="width: 100%">
        @foreach($extraData['lower_member'] as $lower_member)
            <option value="{{$lower_member['id']}}">{{$lower_member['exercicio']}}</option>
        @endforeach
    </select>
</div>
