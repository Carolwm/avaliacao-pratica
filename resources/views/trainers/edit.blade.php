@extends('layouts.base')

@section('content')
<div class="container mx-auto p-4">
    <h1>Editar Treinador</h1>
    
    <form action="{{ url('trainers/'.$trainer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name">Novo Nome: </label>
            <input type="text" name="name" id="name" value="{{ $trainer->name }}" required>
        </div>

        <div class="mb-4">
            <label for="rank">Novo Rank: </label>
            <input type="text" name="rank" id="rank" value="{{ $trainer->rank }}" required>
        </div>

        <button type="submit">
            Salvar Alterações
        </button>
    </form>
</div>
@endsection
