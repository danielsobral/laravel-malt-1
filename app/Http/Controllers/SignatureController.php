<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index(Request $request): View
    {
        $param = $request->all();
        $user = auth()->user();
        $name = $user->name;
        $document = $user->client->document;
        $status = $user->client->signatures->first()->status->name;

        return view('test', [
            'user' => $user,
            'name' => $name,
            'document' => $document,
            'status' => $status,
            'param' => $param,
        ]);
    }
}
