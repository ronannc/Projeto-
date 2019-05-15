<div class="form-group">
    <label for="nascimento">Nascimento</label>
    <input type="date" class="form-control" max="9999-12-31" name="nascimento" id="input_nascimento" placeholder="Nascimento" value ="{{ old('nascimento') ?? $extraData['nascimento'] ?? null }}">
</div>
