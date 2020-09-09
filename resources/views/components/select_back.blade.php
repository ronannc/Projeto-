<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_back">Costas</label>
    <select class="multiple" data-placeholder="Selecione os exercícios de costas" name="back[]" multiple="multiple"
            style="width: 100%">
        @foreach($extraData['back'] as $back)
            @if(isset($data['back']))
                @if($data['back']->contains($back['id']))
                    <option value="{{$back['id']}}" selected>{{$back['exercise']}}</option>
                @else
                    <option value="{{$back['id']}}">{{$back['exercise']}}</option>
                @endif
            @else
                <option value="{{$back['id']}}">{{$back['exercise']}}</option>
            @endif
        @endforeach
    </select>
</div>
