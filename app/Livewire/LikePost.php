<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    // mount solo se llama cuando es instanciado el componente
    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            // Para que Livewire haga el rerender hay que volver a asignar la variable
            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
