<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Message;

class MessageController extends Controller
{
    /**
     * Create a new user controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Auth::user()->messages_received->sortBy('created_at');
        $messages_count = $messages->count();

        $messages_received = Auth::user()->messages_received;
        $messages_received_count = 0;

        foreach ( $messages_received as $message ) {
            if ( $message->pivot->state_id == trans('globals.condition.active') ) {
                $messages_received_count++;
            }
        }

        $data = array(
            'messages' => $messages,
            'messages_count' => $messages_count,
            'messages_received_count' => $messages_received_count
        );

        return view('messages.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSent()
    {
        $messages = Auth::user()->messages_sent->sortBy('created_at');
        $messages_count = $messages->count();

        $messages_received = Auth::user()->messages_received;
        $messages_received_count = 0;

        foreach ( $messages_received as $message ) {
            if ( $message->pivot->state_id == trans('globals.condition.active') ) {
                $messages_received_count++;
            }
        }

        $data = array(
            'messages' => $messages,
            'messages_count' => $messages_count,
            'messages_received_count' => $messages_received_count
        );

        return view('messages.sent', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $message = Message::findOrFail($id);

        if ( is_null($message) ) {
            abort(404);
        }
        else {
            $state = $message->state->first();
            $state->state_id = trans('globals.condition.off');
            $state->save();
        }

        $messages_received = $user->messages_received;
        $messages_received_count = 0;

        foreach ( $messages_received as $received ) {
            if ( $received->pivot->state_id == trans('globals.condition.active') ) {
                $messages_received_count++;
            }
        }

        $sender = $message->sender;
        $recipient = $message->recipients->first();
        $timestamp = $sender->created_at->format('d-m-Y') . ' - ' .
                     $sender->created_at->timezone('-4')->format('g:i A');

        if ( $sender->id == $user->id ) {
            $sender = trans('message.show.me');
        }
        else {
            $sender = trans('message.show.format-header', [
                'name' => $sender->name,
                'second_name' => $sender->second_name,
                'email' => $sender->email
            ]);
        }

        if ( $recipient->id == $user->id ) {
            $recipient = trans('message.show.me');
        }
        else {
            $recipient = trans('message.show.format-header', [
                'name' => $recipient->name,
                'second_name' => $recipient->second_name,
                'email' => $recipient->email
            ]);
        }

        $data = array(
            'message' => $message,
            'messages_received_count' => $messages_received_count,
            'sender' => $sender,
            'recipient' => $recipient,
            'timestamp' => $timestamp
        );

        return view('messages.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return redirect('messages');
    }
}
