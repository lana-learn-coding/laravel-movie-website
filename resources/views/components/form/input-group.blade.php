<div class="form-group">
    <label for="{{ isset($id) ? $id : $name }}">
        {{ isset($title) ? $title : ucwords(implode(" ", explode('_', $name))) }}
    </label>
    <input type="{{ isset($type) ? $type : 'text' }}"
           class="form-control @error($name) is-invalid @enderror"
           id="{{ isset($id) ? $id : $name }}"
           name="{{ $name }}"
           value="{{ old($name) ?: (isset($value) ? $value : '') }}"
           autocomplete="{{ $name }}"
        {{ isset($append) ? $append : '' }}
    >
    @if(isset($help) )
        <small class="form-text text-muted">{{ $help }}</small>
    @endif

    @error($name)
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
