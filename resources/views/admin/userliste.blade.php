@extends('admin.adminhome')

@section('content')
    <div class="container">
        <div class="text-center">
            <a class="btn btn-success" href="{{ route('admin.create.user') }}"> Créer un utilisateur</a>
        </div>
        <h1>Liste des utilisateurs</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>
                            <button class="btn btn-danger">Bloquer</button>
                            <!-- Ajoutez d'autres boutons ici -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
