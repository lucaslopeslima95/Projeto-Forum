<h1>Nova Duvida</h1>

@if ($errors->any())
    foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="{{ route('supports.store')}}" method="post">
    @csrf()
    <input type="text" name="subject">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição"></textarea>
    <input type="submit" value="Enviar">
</form>
