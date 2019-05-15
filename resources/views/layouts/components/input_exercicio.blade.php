<div class="form-group">
    <label for="exercicio">Exercicio</label>
    <input type="text"
           class="form-control"
           name="exercicio"
           id="input_exercicio"
           placeholder="Nome do Exercicio"
           value ="{{ old('exercicio') ?? $extraData['exercicio'] ?? null }}">
</div>
