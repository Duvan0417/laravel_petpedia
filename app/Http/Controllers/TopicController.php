<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the topics.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created topic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Topic::create($request->all());

        return redirect()->route('topics.index')
                         ->with('success', 'Topic created successfully.');
    }

    /**
     * Display the specified topic.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified topic.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified topic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $topic->update($request->all());

        return redirect()->route('topics.index')
                         ->with('success', 'Topic updated successfully');
    }

    /**
     * Remove the specified topic from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index')
                         ->with('success', 'Topic deleted successfully');
    }
}
