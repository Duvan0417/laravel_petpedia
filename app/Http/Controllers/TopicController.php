<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Forum;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::included()->filter()->paginate(10);
        return response()->json($topics);
    }

    public function create()
    {
        $forums = Forum::all();
        return view('topics.create', compact('forums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'forum_id' => 'required|exists:forums,id',
            'creation_date' => 'required|date'
        ]);

        $topic = Topic::create($request->all());

        return response()->json($topic);
    }

    public function show($id)
    {
        $topic = Topic::included()->findOrFail($id);
        return response()->json($topic);
    }

    public function edit(Topic $topic)
    {
        $forums = Forum::all();
        return view('topics.edit', compact('topic', 'forums'));
    }

    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'forum_id' => 'required|exists:forums,id',
            'creation_date' => 'required|date'
        ]);

        $topic->update($request->all());

        return response()->json($topic);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return response()->json(['message' => 'Tópico eliminado correctamente']);
    }
}

