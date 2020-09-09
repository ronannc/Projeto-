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
    <select class="multiple" data-placeholder="Selecione os exercícios de Ombro" name="shoulder[]"
            multiple="multiple" style="width: 100%">
        @foreach($extraData['shoulder'] as $shoulder)
            @if(isset($data['shoulder']))
                @if($data['shoulder']->contains($shoulder['id']))
                    <option value="{{$shoulder['id']}}" selected>{{$shoulder['exercise']}}</option>
                @else
                    <option value="{{$shoulder['id']}}">{{$shoulder['exercise']}}</option>
                @endif
            @else
                <option value="{{$shoulder['id']}}">{{$shoulder['exercise']}}</option>
            @endif
        @endforeach
    </select>
</div>
