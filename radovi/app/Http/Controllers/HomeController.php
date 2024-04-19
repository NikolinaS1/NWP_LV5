<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

//metoda index u HomeControlleru odgovorna za prikaz početne stranice aplikacije nakon prijave korisnika
//provjeravaju se uloge korisnika i s obzirom na ulogu, prosljeđuje ga se na različiti zaslon aplikacije

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'Admin':
                    return redirect()->route('admin');
                    break;
                case 'Teacher':
                    return redirect()->route('teacher');
                    break;
                case 'Student':
                    return redirect()->route('student');
                    break;
                default:
                    return view('home');
                    break;
            }
        } 
    }
}
