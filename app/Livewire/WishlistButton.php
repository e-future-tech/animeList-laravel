<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistButton extends Component
{

    public $item;
    public $is_wishlist;
    public $source;

    public function mount($item, $source)
    {
        $this->item = $item;
        $this->is_wishlist = $item['is_wishlist'];
        $this->source = $source;
    }

    public function toggleWishlist()
    {

        $user = Auth::user();

        if ($user == null) {
            return redirect()->route('login');
        }

        if ($this->is_wishlist) {
            $user->wishlist()->where('mal_id', $this->item['mal_id'])->delete();
            $this->is_wishlist = false;
        } else {
            $user->wishlist()->create([
                'user_id' => $user->user_id,
                'mal_id' => $this->item['mal_id'],
                'images' => $this->item['images'],
                'title' => $this->item['title'],
            ]);
            $this->is_wishlist = true;
        }

        if ($this->source == "local") {
            $this->js('window.location.reload()');
        }
    }

    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
