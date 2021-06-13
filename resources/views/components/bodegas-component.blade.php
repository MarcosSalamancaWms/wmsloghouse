<div class="form-group">
    <label for="inputState">{{ $text }}</label>
    <select id="{{ $reference }}" class="form-control border shadow rounded my-2" name="{{ $reference }}">
        @foreach ($bodegas as $bodega)
            <option value="{{ $bodega->id }}">{{ $bodega->bodega }}</option>
        @endforeach
    </select>
</div>
