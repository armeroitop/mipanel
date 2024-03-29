<div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
        <div class="card-body">
        <h4 class="card-title">
            <a href="#">Mi empresa</a>
        </h4>
        <p class="card-text">Aquí encontraras los documentos de tu empresa que debes subir</p>
        </div>
    </div>
</div>

@if (auth()->user()->canAtLeast(['users.index', 'users.show']))
     <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="{{route('obra.cliente')}}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
            <h4 class="card-title">
                <a href="#">Mis obras</a>
            </h4>
            <p class="card-text">Aquí encontratas todas las obras en la que tu empresa está participando</p>
            </div>
        </div>
    </div>
@endif
{{-- @can(['user.index','users.show'])
   
@endcan --}}

@can('users.show')
    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="{{route('obra.css')}}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
            <h4 class="card-title">
                <a href="#">Mis obras CSS</a>
            </h4>
            <p class="card-text">Aquí encontratas todas las obras en las que realizas la función de Coordinador de seguridad y salud</p>
            </div>
        </div>
    </div>
@endcan


@can('users.show') 
    <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="{{url('paneladmin')}}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
            <h4 class="card-title">
                <a href="#">Panel administrativo</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
        </div>
    </div>            
@endcan