<div class="form-group">
    <label for="weight">Peso</label>
    <input type="number" class="form-control" name="weight" id="weight" placeholder="Peso"
           value="{{ old('weight') ?? $data['weight'] ?? null }}">
</div>
