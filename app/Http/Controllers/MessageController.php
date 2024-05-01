<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends AppBaseController
{

    public function store(Request $request)
    {

        $request->validate([
            'message' => 'required',
        ]);

        $message = $request->input('message');
        $ciphering = "AES-128-CTR";
        $options = 0;
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = openssl_random_pseudo_bytes($iv_length);
        $encryption_key = "1234567890123456";
        $encrypted_message = openssl_encrypt($message, $ciphering, $encryption_key, $options, $encryption_iv);


        Message::create([
            'message' => $encrypted_message,
            'from_id' => auth()->id(),
            'to_id' => $request->input('data_id'),
            'read_at' => null,
            'is_decrypted' => false,
            'encryption_iv' => bin2hex($encryption_iv),
        ]);

        return $this->sendSuccess('Message sent successfully');
    }

    public function messageDecrypt(Request $request)
    {

        $request->validate([
            'data_id' => 'required',
            'secret_key' => 'required',
        ]);

        $message = Message::find($request->input('data_id'));

        $encrypted_message = $message->message;
        $ciphering = "AES-128-CTR";
        $options = 0;
        $iv_length = openssl_cipher_iv_length($ciphering);
        $encryption_iv = hex2bin($message->encryption_iv);
        $encryption_key = $request->input('secret_key');

        $decrypted_message = openssl_decrypt($encrypted_message, $ciphering, $encryption_key, $options, $encryption_iv);

        $message->update([
            'message' => $decrypted_message,
            'is_decrypted' => true,
            'read_at' => now(),
        ]);

        return $this->sendResponse($decrypted_message, 'Message decrypted successfully');
    }
}
