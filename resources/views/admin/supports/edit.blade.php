<h1>Duvida {{ $support->id }}</h1>
<x-alert/>
<form action="{{ route('supports.update',$support->id )}}" method="post">
    @method('PUT')
    @include('admin.supports/partial/form',['support'=>$support])
</form>
