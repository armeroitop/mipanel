
<div class="form-group">
    {!! Form::label('name', 'Nombre del producto') !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripcion del producto') !!}
    {!! Form::text('description', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) !!}
</div>





{{-- <div class="form-group">
    <label for="name">Nombre</label>
    <input name="name" type="text" value="@isset($product->name){{ $product->name }}@endisset" class="form-control">
</div>
<div class="form-group">
    <label for="description">Descripción</label>
    <input name="decription" type="text" value="@isset($product->description){{ $product->description }}@endisset" class="form-control">
</div>
<button type="submit" class="btn btn-sm btn-primary">Guardar</button> --}}

