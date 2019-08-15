<div class="form-group">
    <label for="{{$config}}">{{$title}}</label>
    <input type="text"
           class="form-control"
           name="{{$config}}"
           id="{{$config}}"
           placeholder="{{$title}}"
           value ="{{ old($config) ?? $data[$config] ?? null }}"
    >
</div>
