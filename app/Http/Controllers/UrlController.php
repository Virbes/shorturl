<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{

    public function index(Request $request, Url $url)
    {
        $urls = $url->all();

        return view('urls', ['urls' => $urls]);
    }

    public function store(Request $request, Url $url)
    {
        $code = $url->short_url($request->long_url);
        return response()->json(['short_url' => url($code)]);
    }

    public function show(Request $request, $code)
    {
        $url = DB::table('urls')->where('code', $code)->first();

        if ($url) {
            // ...
            return redirect()->away($url->url);
        } else {
            abort(404);
        }
    }
}
