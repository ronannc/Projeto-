<div class="form-group">
    <label for="cnpj">CNPJ</label>
    <input type="text"
           class="form-control"
           name="cnpj"
           id="cnpj"
           placeholder="CNPJ"
           value ="{{ old('cnpj') ?? $data['cnpj'] ?? null }}">
</div>

@section('js')
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        let options = {
            onKeyPress: function (cnpj, ev, el, op) {
                let mask = '00.000.000/0000-00';
                el.mask(mask, op);
            }
        };

        $('#cnpj').mask('00.000.000/0000-00', options);
    </script>
@stop
