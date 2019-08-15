<div class="form-group">
    <label for="exercise">Exercício</label>
    <input type="text"
           class="form-control"
           name="exercise"
           id="input_exercise"
           placeholder="Nome do Exercicio"
           value="{{ old('exercise') ?? $extraData['exercise'] ?? null }}">
</div>
