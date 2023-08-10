<x-guest-layout>
    <!-- Statut de la session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('articleUpdate', $article->id) }}">
        @csrf
        @method('PUT')

        <!-- Nom du produit -->
        <div>
            <x-input-label for="nameProd" :value="__('Nom du produit')" />
            <x-text-input id="nameProd" class="block mt-1 w-full" type="text" name="nameProd" :value="old('nameProd', $article->nameProd)" required autofocus />
            <x-input-error :messages="$errors->get('nameProd')" class="mt-2" />
        </div>

        <!-- Image du produit -->
        <div class="mt-4">
            <x-input-label for="imageProd" :value="__('Image du produit')" />
            <x-file-input id="imageProd" class="block mt-1 w-full" type="file" name="imageProd" :value="old('imageProd')" accept=".jpeg,.png,.jpg,.gif,.svg" />
            <x-input-error :messages="$errors->get('imageProd')" class="mt-2" />
        </div>

        <!-- Prix du produit -->
        <div class="mt-4">
            <x-input-label for="prixProd" :value="__('Prix du produit')" />
            <x-text-input id="prixProd" class="block mt-1 w-full" type="text" name="prixProd" :value="old('prixProd', $article->prixProd)" required />
            <x-input-error :messages="$errors->get('prixProd')" class="mt-2" />
        </div>

        <!-- Stock du produit -->
        <div class="mt-4">
            <x-input-label for="stockProd" :value="__('Stock du produit')" />
            <x-text-input id="stockProd" class="block mt-1 w-full" type="text" name="stockProd" :value="old('stockProd', $article->stockProd)" required />
            <x-input-error :messages="$errors->get('stockProd')" class="mt-2" />
        </div>

        <!-- Transport -->
        <div class="mt-4">
            <x-input-label for="transport" :value="__('Transport')" />
            <x-text-input id="transport" class="block mt-1 w-full" type="text" name="transport" :value="old('transport', $article->transport)" required />
            <x-input-error :messages="$errors->get('transport')" class="mt-2" />
        </div>

        <!-- Délai de clôture -->
        <div class="mt-4">
            <x-input-label for="délaiClotûre" :value="__('Délai de clôture')" />
            <x-text-input id="délaiClotûre" class="block mt-1 w-full" type="text" name="délaiClotûre" :value="old('délaiClotûre', $article->délaiClotûre)" required />
            <x-input-error :messages="$errors->get('délaiClotûre')" class="mt-2" />
        </div>

        <!-- Détails -->
        <div class="mt-4">
            <x-input-label for="détails" :value="__('Détails')" />
            <x-text-input id="détails" class="block mt-1 w-full" type="text" name="détails" :value="old('détails', $article->détails)" />
            <x-input-error :messages="$errors->get('détails')" class="mt-2" />
        </div>

        <!-- Clôture du délai -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Mettre à jour') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>