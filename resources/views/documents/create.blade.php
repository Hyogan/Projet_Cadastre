@extends('layouts.admin')
@section('contenu_page')

   <div class="dashboard_content">
    <h3>Ajoutez un nouveau document pour une demande </h3>
<div class="container">
    <h2>Upload Document</h2>
    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="demande_id" value="{{ $demande->id }}">

        <div class="form-block">
            <label for="libelle">Libelle</label>
            <input type="text" class="form-control" id="libelle" name="libelle" required>
            @error('libelle')
                <div class="text-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-block">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="arrete">Arrêté</option>
                <option value="decision">Décision</option>
                <option value="message_porte">Message Porté</option>
                @error('type')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </select>
        </div>

        <div class="form-block">
            <label for="description">Description</label>
            <textarea class="form-control" cols="100" rows="50" id="description" name="description" required></textarea>
            @error('description')
                <div class="text-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-block">
            <label for="photo">Uploader une photo Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<style>
    select, input {
        margin: 10px 0 ;
    }
    input[type='text'] {
        padding: 10px 40px;
    }
</style>
@endsection
