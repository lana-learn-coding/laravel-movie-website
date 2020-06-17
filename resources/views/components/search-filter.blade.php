<select name="{{ $name }}" class="form-control form-control-sm" style="font-size: 1rem" {{ isset($lazy) && $lazy ? '' : 'onchange=this.form.submit()' }}>
    <option value="" class="text-muted" {{ request()->query($name) ? '' : 'selected' }}>
        All {{ $name }}
    </option>
    @foreach($options as $option)
        <option value="{{ $option->id }}"
            {{ request()->query($name) == $option->id ? 'selected' : '' }}
        >
            {{ $option->name }}
        </option>
    @endforeach
</select>
