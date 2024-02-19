<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of all messages.
     */
    public function index()
    {
        $messages =Message::latest()->get(); // Display the latest messages first
        return view("admin.messages.index", compact("messages"));
    }

    /**
     * Display a listing of unread messages.
     */
    function unread()
    {
        $messages = Message::where("read", 0)->latest()->get(); // Prioritize latest unread messages
        return view("admin.messages.UnReadMessage", compact("messages"));
    }

    /**
     * Store a newly created resource in storage after a form submission.
     */
    public function store(MessageRequest $request)
    {
        $data = $request->validated();
        $messages=Message::create($data);

        // Optionally, send an email notification to the admin
        Mail::to(config('mail.admin_address', 'admin@example.com'))->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    /**
     * Display the specified resource/message details.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        $message->update(["read" => 1]); // Mark as read upon viewing
        return view("admin.messages.show", compact("message"));
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy(string $id)
    {
        Message::where("id", $id)->delete();
        return redirect()->back()->with('success', 'The message has been deleted successfully.');
    }
}
