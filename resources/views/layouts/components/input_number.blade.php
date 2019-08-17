<div class="form-group">
    <label for="number">Numero</label>
    <input type="number" class="form-control" name="number" id="number" placeholder="Numero"
           value="{{ old('number') ?? $extraData['number'] ?? null }}">
</div>
