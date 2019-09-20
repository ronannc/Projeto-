<div class="form-group">
    <label for="interval">Intervalo</label>
    <input type="text"
           class="form-control"
           name="interval"
           id="interval"
           placeholder="Interval"
           value ="{{ old('interval') ?? $data['interval'] ?? null }}">
</div>
