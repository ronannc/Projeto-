<div class="form-group">
    <label for="birthday">Nascimento</label>
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input name="birthday"
               id="birthday"
               type="text"
               class="form-control pull-right datepicker"
               placeholder="Nascimento"
               value ="{{ old('birthday') ?? $data['birthday'] ?? null }}">
    </div>
    <!-- /.input group -->
</div>

@section('js')
    <script>$('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: "pt-BR"
        });</script>
@endsection
