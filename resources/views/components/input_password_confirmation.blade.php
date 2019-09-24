<div class="form-group">
    <label for="password_confirmation">Confirmação de Senha</label>
    <input type="password"
           class="form-control"
           name="password_confirmation"
           id="password_confirmation"
           placeholder="Confirmação de Senha"
           value="{{ old('password_confirmation') ?? $data['password_confirmation'] ?? null }}">
</div>
