<?php

namespace App\Http\Controllers\Bookmarks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use App\Models\Tag;
use App\Actions\Bookmarks\CreateBookmarkAndTags;



class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): RedirectResponse
    {
        //
        
        (new CreateBookmarkAndTags())->handle(
            request: $request->all(),
            id: auth()->id(),

        );

        return redirect()->route('dashboard');

    }
}
