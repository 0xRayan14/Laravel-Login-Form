@if($type === "textarea")
    <div class="form">
        <label for="{{$name}}">{{$label}}</label>
        <textarea class="form-control @error($name) is-invalid @enderror" name="{{$name}}">{{$slot}}</textarea>
    </div>

@else
    <div class="form">
        <label for="{{$name}}">{{$label}}</label>
        <input class="form-control @error($name) is-invalid @enderror" name="{{$name}}" value="{{$value}}" type="{{$type}}">
    </div>
@endif


@error($name)
    <div class="alert alert-info">
        {{$message}}
    </div>
@enderror
