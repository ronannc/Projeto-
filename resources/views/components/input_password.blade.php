<div class="form-group">
    <label for="password">Senha</label>
    <input type="password"
           class="form-control"
           name="password"
           id="password"
           placeholder="Senha"
           value="{{ old('password') ?? $data['password'] ?? null }}">
</div>
