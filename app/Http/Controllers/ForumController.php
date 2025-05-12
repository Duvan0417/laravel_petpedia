<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\User;

class ForumController extends Controller
{
    public function index()
{$forums = Forum::paginate(10); // O el número de ítems por página que quieras

    return view('forums.index', compact('forums'));
}

    public function create()
    {
        $users = User::all();
        return view('forums.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'nullable|exists:users,id'
        ]);

        Forum::create([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('forums.index')
            ->with('success', 'Foro creado correctamente');
    }

    public function show(Forum $forum)
    {
        $forum->load(['user', 'topics']);
        return view('forums.show', compact('forum'));
    }

    public function edit(Forum $forum)
    {
        $users = User::all();
        return view('forums.edit', compact('forum', 'users'));
    }

    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'nullable|exists:users,id'
        ]);

        $forum->update($request->all());

        return redirect()->route('forums.index')
            ->with('success', 'Foro actualizado correctamente');
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forums.index')
            ->with('success', 'Foro eliminado correctamente');
    }
}