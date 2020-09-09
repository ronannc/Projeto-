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
    <select class="multiple" data-placeholder="Selecione os exercícios de Membro Inferior" name="lower_member[]"
            multiple="multiple" style="width: 100%">
        @foreach($extraData['lower_member'] as $lower_member)
            @if(isset($data['lower_member']))
                @if($data['lower_member']->contains($lower_member['id']))
                    <option value="{{$lower_member['id']}}" selected>{{$lower_member['exercise']}}</option>
                @else
                    <option value="{{$lower_member['id']}}">{{$lower_member['exercise']}}</option>
                @endif
            @else
                <option value="{{$lower_member['id']}}">{{$lower_member['exercise']}}</option>
            @endif
        @endforeach
    </select>
</div>
