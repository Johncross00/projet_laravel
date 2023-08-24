<?php
  
namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Commande;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $products = Product::where('delaiCloture', '>', $now)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('products.index', compact('products'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product(); // Crée une instance vide de Product
        return view('products.create', compact('product'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $directory = 'public/images';

        try
        {
            $image = $request->file('imageProd');

            $filename = uniqid().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs($directory, $filename );

            $product = new Product([
                'nameProd' => $request->input('nameProd'),
                'imageProd' => $filename,
                'prixProd' => $request->input('prixProd'),
                'transport' => $request->input('transport'),
                'delaiCloture' => $request->input('delaiCloture'),
                'details' => $request->input('details'),
            ]);

            // $product->imageProd = $image;
            $product->save();

            return redirect()->route('editor.home')->with('success', 'Le produit a été créé avec succès !');
        } 
        catch (FileException $e)
        {
             return back()->with('error', 'Une erreur s\'est produite lors du téléchargement de l\'image.');
        }
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

     public function update(ProductRequest $request, Product $product)
     {

        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Le panier a été mis à jour!');
        }

        $directory = 'public/images';
        $image = $request->file('imageProd');
        $filename = uniqid().'.'.$image->getClientOriginalExtension();
        $imagePath = $image->storeAs($directory, $filename );
        

         $product->update([
             'nameProd' => $request->input('nameProd'),
             'imageProd' => $filename,
             'prixProd' => $request->input('prixProd'),
             'transport' => $request->input('transport'),
             'delaiCloture' => $request->input('delaiCloture'),
             'details' => $request->input('details'),
         ]);
 
         return redirect()->route('editor.home')->with('success', 'Le produit a été mis à jour !');
 
     }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Vérification des dépendances dans la table "commandes"
        $existingOrders = Commande::where('product_id', $product->idProd)->count();

        if ($existingOrders > 0) {
            return redirect()->route('editor.home')->with('error', 'Ce produit ne peut pas être supprimé car des commandes en cours y sont liées.');
        }

        $product->delete();

        return redirect()->route('editor.home')->with('success', 'Le produit a été supprimé avec succès.');
    }

    public function cart()
    {
        return view('products.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
  
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "nameProd" => $product->nameProd,
                "imageProd" => $product->imageProd,
                "prixProd" => $product->prixProd,
                "transport" => $product->transport,
                "delaiCloture" => $product->delaiCloture,
                "details" => $product->details,
                "quantity" => 1
            ];
        }
  
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Le produit a été ajouté au panier!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produit supprimé!');
        }
    }
    

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Le panier a été mis à jour!');
        }
    }

    public function searchProducts(Request $request)
    {
        $searchQuery = $request->input('search'); // Get the search query from the request

        // Perform the search and get the results using your search logic
        $searchResults = Product::where('nameProd', 'like', '%' . $searchQuery . '%')
                                ->paginate(10);

        // Pass the search results to the view along with the $products variable
        return view('products.index', ['products' => $searchResults]);
    }

    public function orderHistory()
    {
        $user = auth()->user();
        $orders = Commande::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->with('product') // Charger la relation 'product'
        ->get();
        return view('products.orderhistory', compact('orders'));
    }





}