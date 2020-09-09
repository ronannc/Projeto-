<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="select_biceps">Biceps</label>
    <select class="multiple" data-placeholder="Selecione os exercícios de Biceps" name="biceps[]" multiple="multiple"
            style="width: 100%">
        @foreach($extraData['biceps'] as $biceps)
            @if(isset($data['biceps']))
                @if($data['biceps']->contains($biceps['id']))
                    <option value="{{$biceps['id']}}" selected>{{$biceps['exercise']}}</option>
                @else
                    <option value="{{$biceps['id']}}">{{$biceps['exercise']}}</option>
                @endif
            @else
                <option value="{{$biceps['id']}}">{{$biceps['exercise']}}</option>
            @endif
        @endforeach
    </select>
</div>
