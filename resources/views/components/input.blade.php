<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{$value}}" type="{{$type}}">
</div>

@error($name)
    <div class="alert alert-info">
        {{$message}}
    </div>
@enderror
