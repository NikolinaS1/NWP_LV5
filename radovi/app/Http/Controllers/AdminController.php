<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

//ovaj kontroler odgovoran je za upravljanje korisnicima s administratorskim privilegijama
//metoda show prikazuje sve korisnike u sustavu
//metoda edit prikazuje formu za uređivanje uloge određenog korisnika
//pomoću findOrFail pronalazi se korisnik s odgovarajućim ID-om u bazi podataka, a zatim se proslijeđuje korisnika na prikaz forme za uređivanje uloge putem editUserRole.blade.php predloška
//metoda update ažurira ulogu određenog korisnika u bazi podataka
//metoda edit_study_type prikazuje formu za uređivanje tipa studija određenog korisnika, radi na isti način kao edit
//metoda update_study_type ažurira tip studija određenog korisnika u bazi podataka

class AdminController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('admin', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('editUserRole', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin')->with('success', 'User role updated successfully.');
    }

    public function edit_study_type($id)
    {
        $user = User::findOrFail($id);
        return view('editTypeOfStudy', compact('user'));
    }

    public function update_study_type(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->tip_studija = $request->tip_studija;
        $user->save();

        return redirect()->route('admin')->with('success', 'User role updated successfully.');
    }
}
