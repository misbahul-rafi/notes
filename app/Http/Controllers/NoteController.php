<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;


class NoteController extends Controller
{
  public function index()
  {
    $notes = Note::all();
    return view('notes.index', compact('notes'));
  }
  public function create()
  {
    return view('notes.create');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
    ]);
    Note::create($validatedData);
    return redirect()->route('notes.index')->with('success', 'Note berhasil dibuat.');
  }
  public function show($id)
  {
    $note = Note::findOrFail($id);
    return view('notes.show', compact('note'));
  }
  public function edit($id)
  {
    $note = Note::findOrFail($id);
    return view('notes.edit', compact('note'));
  }
  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
    ]);
    $note = Note::findOrFail($id);
    $note->update($validatedData);

    return redirect()->route('notes.index')->with('success', 'Note berhasil diperbarui.');
  }
  public function destroy($id)
  {
    $note = Note::findOrFail($id);
    $note->delete();

    return redirect()->route('notes.index')->with('success', 'Note berhasil dihapus.');
  }
}
