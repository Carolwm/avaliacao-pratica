@extends('layouts.base')

@section('content')
<div class="container mx-auto p-4">
    <h1>Criar Treinador</h1>
    
    <form action="{{ url('trainers') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name">Nome do Treinador: </label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="mb-4">
            <label for="age">Rank do treinador (bronze, ferro, ouro, platina, mestre): </label>
            <input type="text" id="rank" name="rank" required>
        </div>

        <button type="submit">
            Criar Treinador
        </button>
    </form>
</div>
@endsection
