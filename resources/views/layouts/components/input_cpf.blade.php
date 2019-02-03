<div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" class="form-control" name="cpf" id="input_cpf" placeholder="CPF" value ="{{ old('cpf') ?? $data['cpf'] ?? null }}">
</div>

@push('scripts')
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script>
        let options = {
            onKeyPress: function (cpf, ev, el, op) {
                let mask = '000.000.000-00';
                el.mask(mask, op);
            }
        };

        $('#input_cpf').mask('000.000.000-00', options);
    </script>
@endpush
