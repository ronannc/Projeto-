<div class="form-group">
    <label for="id_workout">ID Treino</label>
    <input type="text" class="form-control" name="id_workout" id="input_id_workout" placeholder="ID Treino"
           value="{{ old('id_workout') ?? $extraData['id_workout'] ?? null }}">
</div>
