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
    <select class="multiple" data-placeholder="Selecione os exercícios de Peitoral" name="breast[]" multiple="multiple"
            style="width: 100%">
        @foreach($extraData['breast'] as $breast)
            @if(isset($data['breast']))
                @if($data['breast']->contains($breast['id']))
                    <option value="{{$breast['id']}}" selected>{{$breast['exercise']}}</option>
                @else
                    <option value="{{$breast['id']}}">{{$breast['exercise']}}</option>
                @endif
            @else
                <option value="{{$breast['id']}}">{{$breast['exercise']}}</option>
            @endif
        @endforeach
    </select>
</div>
