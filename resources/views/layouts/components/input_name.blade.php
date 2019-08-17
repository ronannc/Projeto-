<div class="form-group">
    <label for="name">Nome</label>
    <input type="text"
           class="form-control"
           name="name"
           id="name" placeholder="Nome"
           value="{{ old('name') ?? $data['name'] ?? null }}">
</div>
