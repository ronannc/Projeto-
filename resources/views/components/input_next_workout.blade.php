<div class="form-group">
    <label for="next_workout">Próximo Treino</label>
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="next_workout"
               id="next_workout"
               type="text"
               class="form-control pull-right datepicker"
               placeholder="Próximo Treino"
               value ="{{ old('next_workout') ?? $data['next_workout'] ?? null }}">
    </div>
    <!-- /.input group -->
</div>

@section('js')
    <script>$('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
            todayHighlight: true
        });</script>
@endsection
