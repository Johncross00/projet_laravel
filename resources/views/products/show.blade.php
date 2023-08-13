@extends('welcome')
     
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="flex justify-between items-center">
                                <h2 class="text-2xl font-semibold">Show Product</h2>
                                <a href="{{ route('products.index') }}"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Name:</strong>
                                {{ $product->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Details:</strong>
                                {{ $product->detail }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Image:</strong>
                                {{ $product->imageProd }}
                                <!-- Ajoutez ici le code pour afficher l'image -->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Price:</strong>
                                {{ $product->prixProd }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Stock:</strong>
                                {{ $product->stockProd }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Transport:</strong>
                                {{ $product->transport }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Closure Deadline:</strong>
                                {{ $product->delaiCloture }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="block mb-2">Details:</strong>
                                {{ $product->details }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection