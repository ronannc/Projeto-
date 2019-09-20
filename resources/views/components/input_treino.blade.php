<div class="form-group">
    <label for="workout">Treino</label>
    <input type="text"
           class="form-control"
           name="workout"
           id="workout"
           placeholder="Treino"
           value="{{ old('workout') ?? $data['workout'] ?? null }}">
</div>
