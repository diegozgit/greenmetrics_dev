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
        $branchIds = Branch::pluck('idSede');
        return view('add-contract.index', compact('branchIds'));
    }

    public function myContractsIndex()
    {
        $user = Auth::user();

        // Ottieni l'elenco delle sedi gestite dall'utente
        $managedBranches = $user->managedBranches;

        // Ottieni gli id delle sedi gestite dall'utente
        $managedBranchIds = $managedBranches->pluck('idSede')->toArray();

        // Ottieni i contratti associati alle sedi gestite dall'utente
        $contracts = Contract::whereIn('idSede', $managedBranchIds)->get();

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
