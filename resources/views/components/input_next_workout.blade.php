<div class="form-group">
    <label for="next_workout">Próximo Treino</label>
    <input type="date"
           class="form-control"
           max="9999-12-31"
           name="next_workout"
           id="next_workout"
           placeholder="Próximo Treino"
           value ="{{ old('next_workout') ?? $data['next_workout'] ?? null }}">
</div>



