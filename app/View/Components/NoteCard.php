<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoteCard extends Component
{
  public $note;

  public function __construct($note)
  {
      $this->note = $note;
  }

  public function render()
  {
      return view('components.note-card');
  }
}
