@extends('layouts.base')

@section('content')
<div class="container mx-auto p-4">
    <h1>Editar Dragão</h1>
    
    <form action="{{ url('dragons/'.$dragon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name">Nome do Dragao: </label>
            <input type="text" id="name" name="name" value="{{ $dragon->name }}" required>
        </div>

        <div class="mb-4">
            <label for="age">Idade: </label>
            <input type="number" id="age" name="age" value="{{ $dragon->age }}" required>
        </div>

        <div class="mb-4">
            <label for="element">Elemento: </label>
            <input type="text" id="element" name="element" value="{{ $dragon->element }}" required>
        </div>


        <div class="mb-4">
            <label for="trainer_id">Treinador:</label>

            <select name="trainer_id" id="trainer_id">
                <option value="">selecione um treinador:</option>
                @foreach ($trainers as $trainer)
                    @if($trainer-> id === $dragon->trainer->id)
                        <option value="{{ $trainer->id }}" selected>{{ $trainer->name }}</option>
                    @else
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Imagem Atual:</label>
            <img src="{{ asset($dragon->image) }}" alt="{{ $dragon->name }}">
            
            <label for="image">Nova Imagem (Opcional): </label>
            <input type="file" name="image" id="image">
        </div>

       

        <button type="submit">
            Salvar Alterações
        </button>
    </form>
</div>
@endsection
