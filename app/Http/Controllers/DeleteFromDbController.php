<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use DB;
use Illuminate\Http\Request;


class DeleteFromDbController extends Controller
{
    public function index() {
        $reviews = DB::select('select * from contacts');
        return view('review',[
            'reviews'=>$reviews->all()
        ]);
    }
    public function deleteReview($id) {
        $reviews = new Contacts();
        DB::delete('delete from contacts where id = ?',[$id]);
        return view('review', [
            'reviews'=>$reviews->all()
        ]);
    }
}
