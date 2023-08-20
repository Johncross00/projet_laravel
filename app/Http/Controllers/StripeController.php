<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $cart = session('cart', []);
        $user = auth()->user(); // Récupérez l'utilisateur connecté

        $commandes = []; // Tableau pour stocker les nouvelles commandes

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                // Créez une nouvelle commande avec les informations du produit et du panier
                $commande = new Commande([
                    'user_id' => $user->id, // L'ID de l'utilisateur connecté
                    'product_id' => $product->idProd,
                    'quantite' => $details['quantity'],
                    'montant_total' => $details['prixProd'] * $details['quantity'],
                    'date_commande' => now(),
                    // Ajoutez d'autres champs si nécessaire
                ]);
                $commandes[] = $commande; // Ajoutez la commande au tableau
            }
        }

        //$user         = auth()->user();
        $productItems = [];
 
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
 
        foreach (session('cart') as $id => $details) {
 
            $nameProd = $details['nameProd'];
            $total = $details['prixProd'];
            $quantity = $details['quantity'];
 
            $two0 = "00";
            $unit_amount = $total * 100;
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $nameProd,
                    ],
                    'currency'     => 'XOF',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $details['quantity'] //$quantity
            ];
        }
 
        $checkoutSession = Session::create([
            'line_items'            => [$productItems],
            'mode'                  => 'payment',
            'allow_promotion_codes' => true,
            'metadata'              => [
                'user_id' => $user->id
            ],
            'customer_email' => $user->email,
            'success_url' => route('success'),
            'cancel_url'  => route('cancel'),
        ]);
     
        return redirect()->away($checkoutSession->url);
    }
 
    public function success(Request $request)
    {
        // Après le paiement réussi, enregistrez les commandes dans la base de données
        $user = auth()->user();
        $cart = session('cart', []);

        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                // Créez une nouvelle commande avec les informations du produit et du panier
                $commande = new Commande([
                    'user_id' => $user->id,
                    'product_id' => $product->idProd,
                    'quantite' => $details['quantity'],
                    'montant_total' => $details['prixProd'] * $details['quantity'],
                    'date_commande' => now(),
                ]);
                $commande->save(); 
            }
        }

        // Affichez un message de succès
        return view('products.success');
    }
 
    public function cancel()
    {
        return view('products.cancel');
    }
    
}
