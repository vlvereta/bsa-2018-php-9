<?php

namespace App\Http\Controllers;

use Gate;
use App\Currency;
use App\Http\Requests\ValidatedCurrencyRequest;

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
        if (Gate::denies('create')) {
            return redirect('/');
        }
        return view('forms/currency-create');
    }

    public function store(ValidatedCurrencyRequest $request)
    {
        if (Gate::denies('create')) {
            return redirect('/');
        }
        Currency::create($request->only(['title', 'short_name', 'logo_url', 'price']));
        return redirect()->route('index');
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
        if (Gate::denies('edit')) {
            return redirect('/');
        }
        return view('forms/currency-edit', ['currency' => Currency::find($id)]);
    }

    public function update(ValidatedCurrencyRequest $request)
    {
        if (Gate::denies('edit')) {
            return redirect('/');
        } else if ($currency = Currency::find($request->id)) {
            $currency->update($request->only(['title', 'short_name', 'logo_url', 'price']));
            return redirect()->route('show', $request->id);
        } else {
            abort(404);
        }
    }

    /**
     * Deleting object from database.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy(int $id)
    {
        if (Gate::denies('delete')) {
            return redirect('/');
        }
        Currency::destroy($id);
        return redirect()->route('index');
    }
}
