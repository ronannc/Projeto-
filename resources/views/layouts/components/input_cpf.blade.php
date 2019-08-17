<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text"
           class="form-control"
           name="cpf" id="cpf"
           placeholder="CPF"
           value ="{{ old('cpf') ?? $data['cpf'] ?? null }}">
</div>

@section('js')
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        let options = {
            onKeyPress: function (cpf, ev, el, op) {
                let mask = '000.000.000-00';
                el.mask(mask, op);
            }
        };

        $('#cpf').mask('000.000.000-00', options);
    </script>
@stop
