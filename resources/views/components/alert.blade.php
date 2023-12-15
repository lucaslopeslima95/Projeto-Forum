<div class="alert alerrt-danger">
@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
</div>
