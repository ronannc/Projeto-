<div class="form-group">
    <label for="inicio">Inicio</label>
    <input type="date" class="form-control" max="9999-12-31" name="inicio" id="input_inicio" placeholder="Inicio" value ="{{ old('inicio') ?? $extraData['inicio'] ?? null }}">
</div>
