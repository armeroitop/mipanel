
<div class="form-group">
    {!! Form::label('name', 'Nombre del role') !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'slug del role') !!}
    {!! Form::text('slug', null, ['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripcion del role') !!}
    {!! Form::textarea('description', null, ['class'=> 'form-control']) !!}
</div>

<h3>Permiso especial</h3>
<div class="form-group">
    <label> {!! Form::radio('special', 'all-access') !!} Acceso total</label>
    <label> {!! Form::radio('special', 'no-access') !!} Ningun acceso</label>
</div>
<hr>

<h3>Lista de permisos</h3>
<div class="for-group">
    <ul class="list-unstyled">
        @foreach ($permissions as $permission)
            <li>
                <label>
                    {{ Form::checkbox( 'permissions[]',$permission->id, null) }}
                    {{$permission->name}}
                    <em>({{ $permission->description ?: 'Sin descripción'}})</em>
                </label>
            </li>
        @endforeach
    </ul>
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

