<div class="form-group">
    <label for="descricao">Descricao</label>
    <input type="text" class="form-control" name="descricao" id="input_descricao" placeholder="Descricao do Exercicio" value ="{{ old('descricao') ?? $extraData['descricao'] ?? null }}">
</div>
