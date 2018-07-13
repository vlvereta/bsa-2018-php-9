<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('currencies', ['currencies' => Currency::all()]);
    }

    /**
     * Redirect to creating form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('forms/currency-create');
    }

    public function store(ValidatedCurrencyRequest &$request)
    {
//
    }

    /**
     * Show currency by `id` or abort 404.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        if (!$currency = Currency::find($id))
            abort(404);
        return view('currency', ['currency' => $currency]);
    }

    /**
     * Redirect to editing form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        return view('forms/currency-edit', ['id' => $id]);
    }

    public function update(ValidatedCurrencyRequest &$request)
    {
//
    }

    /**
     * Deleting object from database.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy(int $id)
    {
        Currency::destroy($id);
        return view('currencies', ['currencies' => Currency::all()]);
    }
}
