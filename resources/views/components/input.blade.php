<div class="form-group">
    <label for="">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control {{ $class }}" name="{{ $name }}" aria-describedby="nameHelp">
    <span class="text-danger">
        @error("{{ $name }}")
            {{ $message }}
        @enderror
    </span>
</div>
