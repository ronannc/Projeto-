<div class="form-group">
    <label for="social_reason">Rasao Social</label>
    <input type="text"
           class="form-control"
           name="social_reason"
           id="social_reason"
           placeholder="Rasao Social"
           value="{{ old('social_reason') ?? $data['social_reason'] ?? null }}">
</div>
