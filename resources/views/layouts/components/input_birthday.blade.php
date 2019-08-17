<div class="form-group">
    <label for="birthday">Nascimento</label>
    <input type="date" class="form-control" max="9999-12-31" name="birthday" id="birthday" placeholder="Nascimento" value ="{{ old('birthday') ?? $extraData['birthday'] ?? null }}">
</div>
