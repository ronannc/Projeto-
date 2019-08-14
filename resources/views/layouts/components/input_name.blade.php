<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" name="nome" id="input_nome" placeholder="Nome" value ="{{ old('nome') ?? $extraData['nome'] ?? null }}">
</div>
