<div class="form-group">
    <label for="phone">Telefone</label>
    <input type="text"
           class="form-control"
           name="phone" id="phone"
           placeholder="Telefone"
           value ="{{ old('phone') ?? $data['phone'] ?? null }}"
    >
</div>
@push('js')
    <script>
        let optionsPhone = {
            onKeyPress: function (phone, ev, el, op) {
                let mask = '(00) 00000-0000';
                el.mask(mask, op);
            }
        };

        $('#phone').mask('(00) 00000-0000', optionsPhone);
    </script>
@endpush
