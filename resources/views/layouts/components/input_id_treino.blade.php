<div class="form-group">
    <label for="workout_id">ID Treino</label>
    <input type="text" class="form-control" name="workout_id" id="input_workout_id" placeholder="ID Treino"
           value="{{ old('workout_id') ?? $extraData['workout_id'] ?? null }}">
</div>
