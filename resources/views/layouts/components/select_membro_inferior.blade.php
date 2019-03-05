<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_membro_inferior">Membro Inferior</label>
    <select class="multiple" data-placeholder="Selecione os exercicios de membro_inferior" name="membro_inferior[]" multiple="multiple" style="width: 100%">
        @foreach($extraData['membro_inferior'] as $membro_inferior)
            <option value="{{$membro_inferior['id']}}">{{$membro_inferior['exercicio']}}</option>
        @endforeach
    </select>
</div>
