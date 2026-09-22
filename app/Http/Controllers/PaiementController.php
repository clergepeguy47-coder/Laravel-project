<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use Illuminate\Support\Facades\DB;

// Stripe
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaiementController extends Controller
{
    /**
     * Page de paiement (version FAUSSE)
     */
    public function index()
    {
        // Calcul du total du panier
        $total = Panier::where('user_id', auth()->id())
            ->join('produits', 'paniers.produit_id', '=', 'produits.id')
            ->sum(DB::raw('paniers.quantite * produits.prix'));

        return view('paiement.index', compact('total'));
    }

    /**
     * Paiement FAUX (simulation)
     */
    public function valider()
    {
        return redirect()->route('accueil')
            ->with('success', 'Paiement effectué avec succès !');
    }

    /**
     * Page Stripe (vrai paiement)
     */
    public function stripe()
    {
        // Calcul du total
        $total = Panier::where('user_id', auth()->id())
            ->join('produits', 'paniers.produit_id', '=', 'produits.id')
            ->sum(DB::raw('paniers.quantite * produits.prix'));

        // Clé secrète Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Création de la session Stripe
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Commande',
                    ],
                    'unit_amount' => $total * 100, // en centimes
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('paiement.success'),
            'cancel_url' => route('paiement.cancel'),
        ]);

        return view('paiement.stripe', ['session' => $session]);
    }

    /**
     * Paiement Stripe réussi
     */
    public function success()
    {
        return redirect()->route('accueil')
            ->with('success', 'Paiement réussi ! Merci pour votre achat.');
    }

    /**
     * Paiement Stripe annulé
     */
    public function cancel()
    {
        return redirect()->route('paiement')
            ->with('error', 'Paiement annulé.');
    }
}
