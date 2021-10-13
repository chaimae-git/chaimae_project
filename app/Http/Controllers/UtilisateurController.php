<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurRequest;
use App\Models\Statut;
use App\Models\Utilisateur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Intervention\Image\Facades\Image;

class UtilisateurController extends Controller
{

    public function index()
    {
        return view('pages.utilisateurs.consulter');
    }

    public function loginForm(){
        return view('pages.utilisateurs.login');
    }


    public function show(Utilisateur $utilisateur)
    {
        return view('pages.utilisateurs.afficher');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email|exists:utilisateurs,email',
            'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'this email is not exists on doctors table'
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::guard('utilisateur')->attempt($creds)){
            return redirect()->route('aos.consulter');
        }else{
            return back()->with('error', 'incorrect credentials');
        }
    }

    public function logout(){
        Auth::guard('utilisateur')->logout();
        return redirect('/');
    }

}
