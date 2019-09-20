<div class="form-group">
    <label for="email">Email</label>
    <input type="email"
           class="form-control"
           name="email"
           id="email"
           placeholder="Email"
           value="{{ old('email') ?? $data['email'] ?? null }}">
</div>
