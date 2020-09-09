<div class="form-group">
    <label for="start">Início</label>
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="start"
               id="start"
               type="text"
               class="form-control pull-right datepicker"
               placeholder="Início"
               value ="{{ old('start') ?? $data['start'] ?? null }}">
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
