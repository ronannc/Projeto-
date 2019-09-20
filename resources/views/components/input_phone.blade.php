<div class="form-group">
    <label for="phone">Telefone</label>
    <input type="text"
           class="form-control"
           name="phone" id="phone"
           placeholder="Telefone"
           value ="{{ old('phone') ?? $data['phone'] ?? null }}"
    >
</div>
