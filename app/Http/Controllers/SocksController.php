<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocksController extends Controller
{

        public function index()
        {
            $socks = Socks::with('user')->get();
            return view('socks.index', compact('socks'));
        }
    
        public function create()
        {
            $users = User::all();
            return view('socks.create', compact('users'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'Guy' => 'required|string|max:255',
                'URL' => 'required|url',
                'Upload_Date' => 'required|date',
                'users_id' => 'required|exists:users,id',
            ]);
    
            Socks::create($request->all());
    
            return redirect()->route('socks.index')->with('success', 'Par de calcetines creado exitosamente.');
        }
    
        public function show(Socks $sock)
        {
            return view('socks.show', compact('sock'));
        }
    
        public function edit(Socks $sock)
        {
            $users = Users::all();
            return view('socks.edit', compact('sock', 'users'));
        }
    
        public function update(Request $request, Socks $sock)
        {
            $request->validate([
                'Guy' => 'required|string|max:255',
                'URL' => 'required|url',
                'Upload_Date' => 'required|date',
                'users_id' => 'required|exists:users,id',
            ]);
    
            $sock->update($request->all());
    
            return redirect()->route('socks.index')->with('success', 'Par de calcetines actualizado correctamente.');
        }
    
        public function destroy(Socks $sock)
        {
            $sock->delete();
            return redirect()->route('socks.index')->with('success', 'Par de calcetines eliminado.');
        }
    }

