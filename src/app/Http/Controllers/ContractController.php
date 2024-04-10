<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AddContractRequest;
use Illuminate\Auth\Events\Registered;

class ContractController extends Controller
{
    public function addContractIndex()
    {
        $user = Auth::user();

        // Ottieni l'elenco delle sedi o proprietà gestite dall'utente
        $managedBranches = $user->managedBranches;

        return view('add-contract.index', compact('managedBranches'));
    }

    public function myContractsIndex()
    {
        $userId = Auth::user()->id;

        // Ottieni i contratti associati alle sedi o proprietà gestite dall'utente
        $contracts = Contract::where('id', '=',$userId)->get();

        return view('my-contracts.index', compact('contracts'));
    }

    /**
     * Handle account registration request
     *
     * @param AddContractRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function add(AddContractRequest $request)
    {
        try {
            $contract = Contract::create($request->validated());
            event(new Registered($contract));
            return redirect('/addcontracts')->with('success', "Registrazione contratto avvenuta con successo.");
        } catch (\Exception $e) {
            return redirect('/addcontracts')->with('error', "Errore durante la creazione del contratto: " . $e->getMessage());
        }
    }
    public function destroy(Request $request)
    {
        try {
            $contractId = $request->input('contract_id');
            $contract = Contract::findOrFail($contractId);
            $contract->delete();
            return redirect()->back()->with('success', "Contratto eliminato con successo.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Errore durante l'eliminazione del contratto: " . $e->getMessage());
        }
    }

}
