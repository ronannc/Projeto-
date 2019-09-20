<div class="form-group">
    <label for="zipcode">CEP</label>
    <input type="text"
           class="form-control"
           name="zipcode"
           id="zipcode"
           placeholder="CEP"
           value="{{ old('zipcode') ?? $data['zipcode'] ?? null }}">
</div>
