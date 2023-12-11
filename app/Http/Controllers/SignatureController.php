<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SignatureController extends Controller
{
    public function index(Request $request): View
    {
        $validator = Validator::make($request->all(), [
            'food' => 'required|string',
            'drink' => 'required|string'
        ]);

        $food = $validator->fails() ? $validator->messages() : $validator->validated()['food'];
        $drink = $validator->fails() ? $validator->messages() : $validator->validated()['drink'];
        $param = ['food' => $food, 'drink' => $drink];
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
