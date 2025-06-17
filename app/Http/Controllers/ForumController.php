<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::included()->filter()->get();
        return response()->json($forums);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $forum = Forum::create($request->all());
        return response()->json($forum, 201);
    }

    public function show($id)
    {
        $forum = Forum::included()->findOrFail($id);
        return response()->json($forum);
    }

    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $forum->update($request->all());
        return response()->json($forum);
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();
        return response()->json(['message' => 'Foro eliminado correctamente']);
    }
}
