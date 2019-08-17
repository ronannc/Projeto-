<div class="form-group">
    <label for="frequency">Frequencia</label>
    <input type="text"
           class="form-control"
           name="frequency"
           id="frequency"
           placeholder="Frequencia do Exercicio"
           value ="{{ old('frequency') ?? $data['frequency'] ?? null }}">
</div>
