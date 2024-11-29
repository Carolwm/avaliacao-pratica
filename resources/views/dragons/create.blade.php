@extends('layouts.base')


@section('content')
<div class="container mx-auto p-4">
    <h1>Criar Dragao</h1>
    
    <form action="{{ url('dragons') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name">Nome do Dragao: </label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="mb-4">
            <label for="age">Idade: </label>
            <input type="number" id="age" name="age" required>
        </div>

        <div class="mb-4">
            <label for="element">Elemento: </label>
            <input type="text" id="element" name="element" required>
        </div>

        <div class="mb-4">
            <label for="image">Imagem: </label>
            <input type="file" name="image" id="image">
        </div>

        <div class="mb-4">
            <label for="trainer_id">treinador:</label>
            <select name="trainer_id" id="trainer_id">
                <option value="">selecione um treinador:</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">
            Criar Dragao
        </button>
    </form>
</div>
@endsection
