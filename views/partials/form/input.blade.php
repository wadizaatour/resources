    {{ Form::input($type, $name, $value, array_merge(['id' => $name, 'class' => $errors->has($name) ? 'form-control is-invalid input' : 'form-control input'], $attributes)) }}
@if ($errors->has($name))
    <div class="invalid-feedback">
        <span>{{ $errors->first($name) }}</span>
    </div>
@endif
