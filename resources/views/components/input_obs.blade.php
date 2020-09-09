<div class="form-group">
    <label for="obs">Observações</label>
    <textarea class="form-control"
              rows="3"
              name="obs"
              id="obs">
        {{ old('obs') ?? $data['obs'] ?? 'Observações' }}
    </textarea>
</div>
