<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function changePassword()
    {
        return view('dashboard.change-password');
    }
    public function manageBranches()
    {
        $user = Auth::user();

        // Ottieni l'elenco delle sedi gestite dall'utente
        $managedBranches = $user->managedBranches;

         return view('dashboard.manage-branches', compact('managedBranches'));
    }

    public function destroyBranch(Request $request)
    {
        try {
            $branchId = $request->input('branch_id');
            $branch = Branch::findOrFail($branchId);
            $branch->delete();
            return redirect()->back()->with('success', "Sede eliminata con successo.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Errore durante l'eliminazione della sede: " . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "La vecchia password non è corretta.");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password cambiata con successo!");
    }

    public function updateInfo(Request $request)
    {
        # Validation
        $request->validate([
            'new_nome' => 'nullable',
            'new_cognome' => 'nullable',
            'new_ragioneSociale' => 'nullable',
            'new_partitaIva' => 'nullable|unique:users,partitaIva',
            'new_codFiscale' => 'nullable|unique:users,codFiscale',
            'new_indirizzo' => 'nullable',
            'new_civico' => 'nullable',
            'new_CAP' => 'nullable',
            'new_comune' => 'nullable',
            'new_provincia' => 'nullable',
            'new_nazione' => 'nullable',
            'new_numTelefono' => 'nullable',
            'new_email' => 'email|unique:users,email|nullable',
            'new_username' => 'unique:users,username|nullable',
        ]);

        $updateData = [];

        if ($request->filled('new_name')) {
            $updateData['nome'] = $request->new_name;
        }

        if ($request->filled('new_cognome')) {
            $updateData['cognome'] = $request->new_cognome;
        }

        if ($request->filled('new_ragioneSociale')) {
            $updateData['ragioneSociale'] = $request->new_ragioneSociale;
        }

        if ($request->filled('new_indirizzo')) {
            $updateData['indirizzo'] = $request->new_indirizzo;
        }

        if ($request->filled('new_civico')) {
            $updateData['civico'] = $request->new_civico;
        }

        if ($request->filled('new_comune')) {
            $updateData['comune'] = $request->new_comune;
        }

        if ($request->filled('new_provincia')) {
            $updateData['provincia'] = $request->new_provincia;
        }

        if ($request->filled('new_nazione')) {
            $updateData['nazione'] = $request->new_nazione;
        }

        if ($request->filled('new_codFiscale')) {
            $updateData['codFiscale'] = $request->new_codFiscale;
        }

        if ($request->filled('new_numTelefono')) {
            $updateData['numTelefono'] = $request->new_numTelefono;
        }

        if ($request->filled('new_CAP')) {
            $updateData['CAP'] = $request->new_CAP;
        }

        if ($request->filled('new_partitaIva')) {
            $updateData['partitaIva'] = $request->new_partitaIva;
        }

        if ($request->filled('new_email')) {
            $updateData['email'] = $request->new_email;
        }

        if ($request->filled('new_username')) {
            $updateData['username'] = $request->new_username;
        }

        if (!empty($updateData)) {
            User::whereId(auth()->user()->id)->update($updateData);
            return back()->with("status", "Informazioni cambiate con successo!");
        }

        return back()->with("error", "Niente campi da aggiornare.");
    }

}
