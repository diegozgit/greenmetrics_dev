<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AddOfferRequest;
use Illuminate\Auth\Events\Registered;

class OfferController extends Controller
{

    public function addOfferIndex()
    {
        return view('add-offer.index');
    }

    public function myOffersIndex()
    {
        $supplierId = Auth::guard('supplier')->user()->idFornitore;

        // Ottieni i contratti associati alle sedi o proprietà gestite dall'utente
        $offers = Offer::where('idFornitore', '=',$supplierId)->get();

        return view('my-offers.index', compact('offers'));
    }

    /**
     * Handle account registration request
     *
     * @param AddOfferRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function add(AddOfferRequest $request)
    {
        try {
            $offer = Offer::create($request->validated());
            event(new Registered($offer));
            return redirect('/addoffers')->with('success', "Registrazione offerta avvenuta con successo.");
        } catch (\Exception $e) {
            dd($request);
            return redirect('/addoffers')->with('error', "Errore durante la creazione dell'offerta: " . $e->getMessage());
        }
    }
    public function destroy(Request $request)
    {
        try {
            $offerId = $request->input('offer_id');
            $offer = Offer::findOrFail($offerId);
            $offer->delete();
            return redirect()->back()->with('success', "Offerta eliminata con successo.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Errore durante l'eliminazione dell'offerta: " . $e->getMessage());
        }
    }

}
