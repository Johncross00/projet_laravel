@extends('welcome')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier un produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Retour</a>
            </div>
        </div>
    </div>

    <!-- Statut de la session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oups !</strong> Il y a eu des problèmes avec votre saisie.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.update', $product->idProd) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <strong>Nom du produit :</strong>
            <input type="text" name="nameProd" class="form-control" placeholder="Nom du produit"
                value="{{ $product->nameProd }}" required autofocus />
            @error('nameProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Image du produit :</strong>
            <input type="file" name="imageProd" class="form-control"  accept=".jpeg,.png,.jpg,.gif,.svg" />
            <img src="{{ asset('storage/images/' . $product->imageProd) }}" alt="{{ $product->nameProd }}"
                width="200px" class="mt-2">
            @error('imageProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Prix du produit :</strong>
            <input type="number" name="prixProd" class="form-control" placeholder="Prix du produit"
                value="{{ $product->prixProd }}" min="0" required />
            @error('prixProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Transport :</strong>
            <select name="transport" class="form-control" required>
                <option value="Avion" {{ $product->transport === 'Avion' ? 'selected' : '' }}>Avion</option>
                <option value="Bateau" {{ $product->transport === 'Bateau' ? 'selected' : '' }}>Bateau</option>
            </select>
            @error('transport')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Délai de clôture :</strong>
            <input type="date" name="delaiCloture" class="form-control" placeholder="Délai de clôture"
                value="{{ $product->delaiCloture }}" required />
            @error('delaiCloture')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Détails :</strong>
            <textarea name="details" class="form-control"
                rows="4">{{ $product->details }}</textarea>
            @error('details')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-4">
            <button type="reset" class="btn btn-secondary">Annuler</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>

    </form>
@endsection