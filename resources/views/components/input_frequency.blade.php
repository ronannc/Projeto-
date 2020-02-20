<div class="form-group">
    <label for="frequency">Frequência</label>
    <input type="text"
           class="form-control"
           name="frequency"
           id="frequency"
           placeholder="Frequência do Exercício"
           value ="{{ old('frequency') ?? $data['frequency'] ?? null }}">
</div>
