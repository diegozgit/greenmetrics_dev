<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBranchRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\View;

class BranchController extends Controller
{
    public function index()
    {
        return view('branches.index');
    }

    /**
     * Handle account registration request
     *
     * @param CreateBranchRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateBranchRequest $request)
    {

        $branch = Branch::create($request->validated());

        event(new Registered($branch));

        return redirect('/branches')->with('success', "Registrazione avvenuta con successo.");
    }
}
