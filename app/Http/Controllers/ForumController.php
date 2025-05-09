<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the forums.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forum::all();
        return view('forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new forum.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forums.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'forum_name' => 'required|string|max:255',
        'description' => 'required|string',
        'creation_date' => 'required|date',
    ]);

    $forumData = $request->all();
    $forumData['user_id'] = Auth::id();

    Forum::create($forumData);

    return redirect()->route('forums.index')
                     ->with('success', 'Forum created successfully.');
}


    /**
     * Display the specified forum.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        return view('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified forum.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        return view('forums.edit', compact('forum'));
    }

    /**
     * Update the specified forum in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'description' => 'required|string',
            'creation_date' => 'required|date',
        ]);

        $forum->update($request->all());

        return redirect()->route('forums.index')
                         ->with('success', 'Forum updated successfully');
    }

    /**
     * Remove the specified forum from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();

        return redirect()->route('forums.index')
                         ->with('success', 'Forum deleted successfully');
    }
}
