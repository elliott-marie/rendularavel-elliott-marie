<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


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
        return view('home');
    }

    public function indexUser(){
        if(Auth::check()){
            $articles = Auth::user()->articles;
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $id = Auth::user()->id;
            $created_at = Auth::user()->created_at;
        }else{
            return view('home');
        }
        return view('users.profil-login', ['name' => $name, 'email' => $email, 'id' => $id, 'created_at' => $created_at, 'articles' => $articles]);
    }


    public function getAccount(){
        $user = Auth::user();
        return view('users.editProfil',  ['user' => $user]);
    }


    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        if($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect()->route('indexUser');

    }


    public function getSaveAccount($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);

    }

    public function sendmail(Request $request){

        $request->session()->flash('alert-success', 'Email was successful sent!');
        return view('email.sendmail');
    }

    public function formulaire()
    {
        return view ('contact');
    }

    public function takeContact(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'email' => 'required'
            ],
            [
                'title.required' => 'Un contenu est requis.',
                'email.required' => 'Un email est requis.'
            ]);

        Contact::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'email' => $request->email,
        ]);

        $request->session()->flash('alert-success', 'Merci pour votre message !');
        return redirect()->route('article.index');
    }
}
