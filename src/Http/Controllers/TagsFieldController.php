<?php

namespace Spatie\TagsField\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Tags\Tag;

class TagsFieldController extends Controller
{
    public function index(Request $request)
    {
        $query = Tag::query();

        if ($request->has('filter.containing')) {
            $query->containing($request['filter']['containing']);
        }

        if ($request->has('filter.type')) {
            $query->containing($request['filter']['type']);
        }

        return $query->get()->map(function (Tag $tag) {
            return $tag->name;
        });
    }
}
