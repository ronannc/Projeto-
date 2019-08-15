<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="input_name" placeholder="Nome"
           value="{{ old('name') ?? $extraData['name'] ?? null }}">
</div>
