<div>
    <label for="{{ $referenceInput }}">{{ $text }}</label>
    <div class="input-group my-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="{{ $classIcon }}"></i>
            </div>
        </div>
        <input type="{{ $type }}" class="form-control shadow rounded" id="{{ $referenceInput }}"
            name="{{ $referenceInput }}" placeholder="{{ $placeholder }}" value="{{ $value }}">
    </div>
</div>
