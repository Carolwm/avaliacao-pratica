@extends('layouts.base')


@section('content')
<div class="container mx-auto p-4">
    <div>
        <h1>Lista treinadores</h1>
        <a href="{{ url('trainers/create') }}">
            Criar Treinador
        </a>
    </div>

    <div>
        @foreach($trainers as $trainer)
        <div>
            <h3>{{ $trainer->name }}</h3>
            <h3>{{ $trainer->rank }}</h3>

            <div>
                <a href="{{ url('trainers/'.$trainer->id.'/edit') }}">
                    Editar
                </a>

                <form action="{{ url('trainers/'.$trainer->id) }}" method="POST">
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
