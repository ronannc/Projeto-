<div class="form-group">
    <label for="street">Rua</label>
    <input type="text"
           class="form-control"
           name="street" id="street"
           placeholder="Rua"
           value="{{ old('street') ?? $data['street'] ?? null }}">
</div>
