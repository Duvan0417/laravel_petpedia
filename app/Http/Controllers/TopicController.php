<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Forum;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with('forum')->paginate(10);
        return view('topics.index', compact('topics'));
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

        Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'forum_id' => $request->forum_id,
            'creation_date' => $request->creation_date
        ]);

        return redirect()->route('topics.index')
            ->with('success', 'Tópico creado correctamente');
    }
public function show($id)
{
    $forum = Forum::with(['user', 'topics.comments'])->findOrFail($id);
    return view('forums.show', compact('forum'));
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

        return redirect()->route('topics.index')
            ->with('success', 'Tópico actualizado correctamente');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('topics.index')
            ->with('success', 'Tópico eliminado correctamente');
    }
}
