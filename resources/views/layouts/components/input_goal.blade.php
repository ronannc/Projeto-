<div class="form-group">
    <label for="goal">Objetivo</label>
    <input type="text"
           class="form-control"
           name="goal"
           id="goal"
           placeholder="Objetivo"
           value ="{{ old('goal') ?? $data['goal'] ?? null }}">
</div>
