<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class RevisorController extends Controller
{
    public function index()
    {
        $product_to_check = Product::where('is_accepted', null)->first();
        return view('revisor.index', compact('product_to_check'));
    }

    public function workWithUs(){
        return view ('user.work_with_us');
    }

    public function acceptProduct(Product $product)
    {
        $product->setAccepted(true);
        Session::put('last_product_id', $product->id);
        return redirect()->back()->with('message', 'Complimenti hai accettato l\'annuncio');
    }

    public function rejectProduct(Product $product)
    {
        $product->setAccepted(false);
        Session::put('last_product_id', $product->id);
        return redirect()->back()->with('revisor.denied', 'Annuncio Rifiutato');
    }

    public function becomeRevisor(Request $request)
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user(), $request->message));
        return redirect()->back()->with('message', 'Complimenti hai richiesto di diventare revisore correttamente');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }

    public function undo()
    {
        $lastProductId = Session::get('last_product_id');


        $lastProductId = Product::find($lastProductId);
        $lastProductId->is_accepted = null;
        $lastProductId->save();


        Session::forget('last_product_id',);


        return back();
    }
}
