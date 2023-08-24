@extends('admin.adminhome')

@section('content')
    <div class="container">
        <h1>Créer un nouvel utilisateur</h1>

        <form action="{{ route('admin.store.user') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" name="address" class="form-control">
            </div>


            <!-- Ajoutez d'autres champs ici -->

            <input type="hidden" name="usertype" value="editor">

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
