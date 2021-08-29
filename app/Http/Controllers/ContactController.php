<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function create(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $form = $request->all();
        $gendername=array();
        $gendername=[
            '1' => "男性",
            '2' => "女性"
        ];
        $data = $gendername['var_dump[$form['gender']']];
        return view('confirm', ['form' => $form]);
    }
    public function thanks(Request $request)
    {
        if($request->get('return')){
            return redirect('/')->withInput();
        }else{
        $form = $request->all();
        Contact::create($form);
        return view('thanks');
        };
    }
    public function manegement()
    {
        $items = Contact::paginate(10);
        return view('/manegement', ['contacts'=>$items]);
    }
    public function find(Request $request)
    {
        $created_at1 = strtotime($request->input('date'));
        $created_at2 = strtotime($request->input('date'));

        $results = Contact::where('gender', 'LIKE', "%{request->input}%")
            ->where('created_at1','>', 'LIKE', "%{request->input}%")
            ->where('created_at2','<', 'LIKE', "%{request->input}%")
            ->where('email', 'LIKE', "%{request->input}%")
            ->where('fullname', 'LIKE', "%{request(lastName)->input}%")
            ->orwhere('fullname', 'LIKE', "%{request(firstname)->input}%")
            ->paginate(10);
        dd($results);
        return view('manegement', ['contacts'=>$results]);
    }
    public function delete(Request $request)
    {
        $items = Contact::find($request->id);
        $items->delete();
        $items = Contact::paginate(10);
        return redirect('/manegement', ['contacts'=>$items]);
    }
}
