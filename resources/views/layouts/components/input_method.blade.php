<div class="form-group">
    <label for="method">Metodo</label>
    <input type="text"
           class="form-control"
           name="method"
           id="method"
           placeholder="Metodo"
           value ="{{ old('method') ?? $data['method'] ?? null }}">
</div>
