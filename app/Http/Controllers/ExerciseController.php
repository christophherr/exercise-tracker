<?php

namespace App\Http\Controllers;

use App\User;
use App\Exercise;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class ExerciseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function get(Request $request)
    {
        $user_id = $request->get('userId');
        $from = $request->get('from');
        $to = $request->get('to');
        $limit = $request->get('limit');

        if (empty($user_id)) {
            return response()->json(['message'=>'Error. Please provide a valid userId.']);
        }

        if ($from && $to) {
            $exercises = DB::table('exercises')->where('user_id', $user_id)->whereBetween('date', [$from, $to])->limit($limit)->get();
        } elseif ($from) {
            $exercises = DB::table('exercises')->where('user_id', $user_id)->where('date', '>', $from)->limit($limit)->get();
        } elseif ($to) {
            $exercises = DB::table('exercises')->where('user_id', $user_id)->where('date', '<', $to)->limit($limit)->get();
        } else {
            $exercises = DB::table('exercises')->where('user_id', $user_id)->limit($limit)->get();
        }

        $username = User::where('id', $request->userId)->value('username');

        $counter = 0;
        $details = [];

        foreach ($exercises as $exercise) {
            $details[] = 'description: ' . $exercise->description;
            $details[] = 'duration: ' . $exercise->duration;
            $details[] = 'date: ' . $exercise->date;

            $counter += 1;
        }

        return response()->json(['user_id'=>$request->userId, 'username'=>$username, 'count' => $counter, $details]);
    }

    public function add(Request $request)
    {

        if (!empty($request->date)) {
            $date = $request->date;
        } else {
            $date = date('Y-m-d');
        }

        $request->userId = (int)$request->userId;

        $exercise = Exercise::create([
            'user_id' => $request->userId,
            'description' => $request->description,
            'duration' => $request->duration,
            'date' => $date
        ]);

        $username = User::where('id', $request->userId)->value('username');

        return response()->json(['username'=>$username, 'user_id'=>$exercise->user_id, 'description'=>$exercise->description, 'duration'=>$exercise->duration, 'date'=>$exercise->date]);
    }
}
