<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FavoriteButton extends Component
{

    public $item;
    public $is_favorited;
    public $source;

    public function mount($item, $source)
    {
        $this->item = $item;
        $this->is_favorited = $item['is_favorited'];
        $this->source = $source;
    }

    public function toggleFavorite()
    {
        $user = Auth::user();

        if ($user == null) {
            return redirect()->route('login');
        }

        if ($this->is_favorited) {
            // Hapus jika sudah ada
            $user->favorite()->where('mal_id', $this->item['mal_id'])->delete();
            $this->is_favorited = false;

            if ($this->source == "local") {
                $this->js('window.location.reload()');
            }
        } else {
            // Simpan (Post) ke database
            $user->favorite()->create([
                'user_id' => $user->user_id,
                'mal_id' => $this->item['mal_id'],
                'images' => $this->item['images'],
                'title' => $this->item['title'],
                "type" => $this->item['type'],
                "year" => $this->item['year'],
                "genres" => $this->item['genres'],
                "status" => $this->item['status'],
                "score" => $this->item['score'],
                "synopsis" => $this->item['synopsis']
            ]);
            $this->is_favorited = true;
        }
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
