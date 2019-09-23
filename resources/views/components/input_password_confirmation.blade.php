<div class="form-group">
    <label for="password_confirmation">Senha</label>
    <input type="password"
           class="form-control"
           name="password_confirmation"
           id="password_confirmation"
           placeholder="Senha"
           value="{{ old('password_confirmation') ?? $data['password_confirmation'] ?? null }}">
</div>
