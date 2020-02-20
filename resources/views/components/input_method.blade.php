<div class="form-group">
    <label for="method">Método</label>
    <input type="text"
           class="form-control"
           name="method"
           id="method"
           placeholder="Método"
           value ="{{ old('method') ?? $data['method'] ?? null }}">
</div>
