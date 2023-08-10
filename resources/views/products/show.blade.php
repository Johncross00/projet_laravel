<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> <!-- J'ai ajouté la classe dark:text-gray-100 pour le texte sombre -->
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="flex justify-between items-center">
                                <h2 class="text-2xl font-semibold">Show Product</h2>
                                <a href="{{ route('article.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Back</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center text-blue-500 dark:text-blue-400"><small>Tutorial by ItSolutionStuff.com</small></p> <!-- J'ai ajouté dark:text-blue-400 pour le texte sombre -->
</x-app-layout>
