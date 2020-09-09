<div class="form-group">
    <label for="date">Data</label>
    <input type="date"
           class="form-control"
           max="9999-12-31"
           name="date"
           id="date"
           placeholder="Data"
           value ="{{ old('date') ?? $data['date'] ?? null }}"
    >
</div>

