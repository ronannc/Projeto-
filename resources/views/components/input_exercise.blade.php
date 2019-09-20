<div class="form-group">
    <label for="exercise">Exercício</label>
    <input type="text"
           class="form-control"
           name="exercise"
           id="exercise"
           placeholder="Nome do Exercício"
           value="{{ old('exercise') ?? $data['exercise'] ?? null }}">
</div>
