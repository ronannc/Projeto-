<div class="form-group">
    <label for="treino">Treino</label>
    <input type="text" class="form-control" name="treino" id="input_treino" placeholder="Treino"
           value="{{ old('workout') ?? $extraData['workout'] ?? null }}">
</div>
