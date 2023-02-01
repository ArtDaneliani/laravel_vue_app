<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
            $reviews = new Contacts();

            //передаем с модели все данные через обьект ревьюС в шаблон (вьюшку)
            //как в кодигнайтер - с контролера в массиве дата передаем массив $reviews
            return view('review', [
                'reviews'=>$reviews->all()
            ]);
//        dd($reviews->all());
    }

    public function review_check(Request $request) {
            $valid = $request->validate([
                'email' => 'required|min:4|max:100',
                'subject' => 'required|min:4|max:100',
                'message' => 'required|min:15|max:500'
            ]);

            $review = new Contacts(); //create object

            //left side = DB-fields name
            //right side = key(from request user inputs) request

            $review->email = $request->input('email');
            $review->subject = $request->input('subject');
            $review->message = $request->input('message');

            //method save() is from parent Model
            $review->save();

            //redirect to reviews page
            return redirect()->route('review.check');
    }
}
