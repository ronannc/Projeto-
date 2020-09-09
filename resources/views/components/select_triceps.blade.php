<?php
/**
 * Created by PhpStorm.
 * User: Ronan Nunes Campos
 * Date: 02/03/2019
 * Time: 12:08
 */
?>

<div class="form-group">
    <label for="triceps">Triceps</label>
    <select class="multiple" data-placeholder="Selecione os exercícios de Triceps" name="triceps[]" id="triceps" multiple="multiple"
            style="width: 100%">
        @foreach($extraData['triceps'] as $triceps)
            @if(isset($data['triceps']))
                @if($data['triceps']->contains($triceps['id']))
                    <option value="{{$triceps['id']}}" selected>{{$triceps['exercise']}}</option>
                @else
                    <option value="{{$triceps['id']}}">{{$triceps['exercise']}}</option>
                @endif
            @else
                <option value="{{$triceps['id']}}">{{$triceps['exercise']}}</option>
            @endif
        @endforeach
    </select>
</div>
