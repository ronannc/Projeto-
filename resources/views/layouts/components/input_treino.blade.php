<div class="form-group">
    <label for="workout">Treino</label>
    <input type="text" class="form-control" name="workout" id="input_workout" placeholder="Treino"
           value="{{ old('workout') ?? $extraData['workout'] ?? null }}">
</div>
