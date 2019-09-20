<div class="form-group">
    <label for="blood_pressure">Pressão Sanguínea</label>
    <input type="number" class="form-control" name="blood_pressure" id="blood_pressure" placeholder="Pressão Sanguínea"
           value="{{ old('blood_pressure') ?? $data['blood_pressure'] ?? null }}">
</div>
