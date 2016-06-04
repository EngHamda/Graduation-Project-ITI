<?php

namespace App\Http\Controllers;
//Command
use App\Commands\StoreAdviceCommand;

use App\Commands\UpdateAdviceCommand;

use App\Commands\DestroyAdviceCommand;


use Illuminate\Http\Request;
//Request
use App\Http\Requests;

use App\Http\Requests\StoreAdviceRequest;

use App\Http\Requests\UpdateAdviceRequest;
//Model
use App\Advice;

use App\Like;
use Auth;
class AdvicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $advices = Advice::all();
        $allLikes = Like::all();
        return view('advice.index', compact('advices', 'allLikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('advice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdviceRequest $request)
    {
        $advice = $request->input('advice');
        $physician_id = $request->input('user_id');

        $command = new StoreAdviceCommand($advice, $physician_id);
        $this->dispatch($command);
        return \Redirect::route('advices.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advice = Advice::find($id);
        return view('advice.show', compact('advice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $advice = Advice::find($id);
        return view('advice.edit', compact('advice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdviceRequest $request, $id)
    {
        $advice = $request->input('advice');


        $command = new UpdateAdviceCommand($id, $advice);
        $this->dispatch($command);
        return \Redirect::route('advices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $command = new DestroyAdviceCommand($id);
        $this->dispatch($command);
        return \Redirect::route('advices.index');
    }

    public function adviceLikeAdvice(Request $request)
    {
        $advice_id = intval($request['adviceId']);
        $is_Like = $request['isLike'] == 'true';
        $update = 'false';

        // Retrieve advice object from database
        $advice = Advice::find($advice_id);

        if (!$advice) {
            return 'there is not any advice';
        }
        //Retrieve loggined user
        $user = Auth::user();


        //Retrieve like from database

        $like = $user->likes()->where('advice_id', $advice_id)->first();


        if ($like)//The user liked or disliked this advice
        {
            $already_liked = $like->liked;
            $update = 'true';
            if ($already_liked == $is_Like) {
                $like->delete(); //if user pressed the same link like or dislike twice delete the row
                return 'like deleted';
            }

        } else {
            $like = new Like();

        }

        $like->liked = $is_Like;

        $like->user_id = $user->id;

        $like->advice_id = $advice->id;


        if ($update == 'true') {

            Like::where('id', $like->id)->update(array('liked' => $like->liked));
        } else {

            Like::create([
                'liked' => $like->liked,
                'user_id' => $like->user_id,
                'advice_id' => $like->advice_id
            ]);
        }

        return 'this is a return';
    }

    public function latestAdvices()
    {
        $latestAdvices = DB::table('advices')->orderBy('created_at', 'desc')->take(5)->get();
        return view('homepage', compact('latestAdvices'));

    }
}