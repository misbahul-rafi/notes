<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
  // Menampilkan daftar semua note
  public function index()
  {
    $notes = Note::all(); // Mengambil semua data note
    return view('notes.index', compact('notes'));
  }

  // Menampilkan form untuk membuat note baru
  public function create()
  {
    return view('notes.create');
  }

  // Menyimpan note baru ke database
  public function store(Request $request)
  {
    // Validasi input
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
    ]);

    // Menyimpan data note baru
    Note::create($validatedData);

    // Redirect ke halaman daftar note
    return redirect()->route('notes.index')->with('success', 'Note berhasil dibuat.');
  }

  // Menampilkan detail note tertentu
  public function show($id)
  {
    $note = Note::findOrFail($id);
    return view('notes.show', compact('note'));
  }

  // Menampilkan form untuk edit note
  public function edit($id)
  {
    $note = Note::findOrFail($id);
    return view('notes.edit', compact('note'));
  }

  // Memperbarui note di database
  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
    ]);

    // Mengupdate note
    $note = Note::findOrFail($id);
    $note->update($validatedData);

    return redirect()->route('notes.index')->with('success', 'Note berhasil diperbarui.');
  }

  // Menghapus note dari database
  public function destroy($id)
  {
    $note = Note::findOrFail($id);
    $note->delete();

    return redirect()->route('notes.index')->with('success', 'Note berhasil dihapus.');
  }
}
