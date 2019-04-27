<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="id_treino">Treino</label>
    <select class="multiple form-control select2" data-placeholder="Selecione os exercicios de biceps" name="id_treino" style="width: 100%">
        @foreach($extraData['treino'] as $treino)
            <option value="{{$treino['id']}}">{{$treino['descricao']}}</option>
        @endforeach
    </select>
</div>

