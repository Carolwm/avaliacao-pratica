@extends('layouts.base')

@section('content')

@can('create', App\Models\Dragon::class)
    <div>
        <h1">Lista de dagoes</h1>
        <a href="{{ url('dragons/create') }}" class="">
            Criar Dragao
        </a>
    </div>
@endcan

<div class="container mx-auto p-4">
    <div>
        @foreach($dragons as $dragon)
        <div>
            <div class="mb-4">
                <img src="{{ asset($dragon->image) }}" alt="{{ $dragon->name }}" class="">
            </div>
            <h3>{{ $dragon->name }}</h3>
            <p>Idade: {{ $dragon->age }}</p>
            <p>Elemento: {{ $dragon->element}}</p>
            <p>Treinador: {{ $dragon->trainer->name }}</p>

            <div>
                <a href="{{ url('dragons/'.$dragon->id.'/edit') }}">
                    Editar
                </a>

                <form action="{{ url('dragons/'.$dragon->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection