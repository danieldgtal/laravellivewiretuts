<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{   
  use WithPagination;
  use WithFileUploads;
  public $newComment;
  public $image;
  protected $listeners = ['fileUpload' => 'handleFileUpload'];
  // public $comments;

  // public function mount()
  // {
  //   // mounts works like a constructor in a component
  //   // $comments = Comment::all(); // gets all comment
  //   // $comments = Comment::latest()->paginate(2); // gets the latest comment
  //   // $this->comments = $comments;
  // }

  public function handleFileUpload($imageData)
  {

    $this->image = $imageData;
  }

  public function updated($newComment)
  {
    $this->validateOnly($newComment, ['newComment' =>'required|max:255']);
  }

  public function addComment()
  {
    $this->validate(['newComment' => 'required']);
    $image = $this->storeImage();

    $createdComment = Comment::create([
      'body' => $this->newComment, 'user_id' => 1,
      'image' => $image,
    ]);
    // $this->comments->prepend($createdComment);
    $this->newComment = "";
    session()->flash('message','Comment added succesfully');

  }
  public function storeImage()
  {
    if(!$this->image) {
      return null;
    }
    $img = ImageManagerStatic::make($this->image)->encode('jpg');
    Storage::put('image.jpg', $img);
    
  }
  public function remove($id)
  {
    $comment = Comment::find($id);
    $comment->delete();
    // $this->comments = $this->comments->except($id);
    session()->flash('message','Comment deleted succesfully');

  }

  public function render()
  {
    return view('livewire.comment',[
      'comments' => Comment::latest()->paginate(2),
    ]);
  }
}
