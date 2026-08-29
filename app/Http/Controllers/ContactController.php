<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);

        SendContactMail::dispatch(
            $validated['name'],
            $validated['email'],
            $validated['subject'],
            $validated['message']
        );

        // return redirect()
        //     ->route('contact')
        //     ->with(
        //         'success',
        //         'Tin nhắn của bạn đã được gửi thành công!'
        //     );

        return response()->json([
            'success' => true,
            'message' => 'Tin nhắn của bạn đã được gửi thành công!',
        ]);
    }
}