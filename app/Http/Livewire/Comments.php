<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{   
  public $newComment;
  // public $comments;

  // public function mount()
  // {
  //   // mounts works like a constructor in a component
  //   // $comments = Comment::all(); // gets all comment
  //   $comments = Comment::latest()->get(); // gets the latest comment
  //   $this->comments = $comments;
  // }

  public function updated($newComment)
  {
    $this->validateOnly($newComment, ['newComment' =>'required|max:255']);
  }

  public function addComment()
  {
   $this->validate(['newComment' => 'required']);

    $createdComment = Comment::create([
      'body' => $this->newComment, 'user_id' => 1
    ]);
    $this->comments->prepend($createdComment);
    $this->newComment = "";
    session()->flash('message','Comment added succesfully');

  }

  public function remove($id)
  {
    $comment = Comment::find($id);
    $comment->delete();
    $this->comments = $this->comments->except($id);
    session()->flash('message','Comment deleted succesfully');

  }

  public function render()
  {
    return view('livewire.comment');
  }
}
