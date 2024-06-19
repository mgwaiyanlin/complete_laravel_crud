<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function store() {
        // dump(request()->get('content', ''));

        request()->validate([
            'content' => 'required|min:5|max:100'
        ]);

        $content = Idea::create([
            "content" => request()->get('content'),
        ]);

        $content->save();

        return redirect()->route('dashboard.index')->with('success', 'Idea created successfully!');
    }
}
