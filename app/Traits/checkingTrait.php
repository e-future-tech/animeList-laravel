<?php

namespace App\Traits;

use Illuminate\Container\Attributes\Auth;

trait checkingTrait
{
    //
    public function check_fav_wish($data, $user)
    {

        $favorites_id = $user->favorite()->pluck('mal_id')->toArray();
        $wishlist_id = $user->wishlist()->pluck('mal_id')->toArray();

        $check_items = collect($data)->map(function ($item) use ($favorites_id, $wishlist_id) {
            $item['is_favorited'] = in_array($item['mal_id'], $favorites_id);
            $item['is_wishlist'] = in_array($item['mal_id'], $wishlist_id);

            return $item;
        });

        return $check_items;
    }

    //
    public function check_single_fav_wish($data, $user)
    {
        $favorites_id = $user->favorite()->pluck('mal_id')->toArray();
        $wishlist_id = $user->wishlist()->pluck('mal_id')->toArray();

        $data['is_favorited'] = in_array($data['mal_id'], $favorites_id);
        $data['is_wishlist'] = in_array($data['mal_id'], $wishlist_id);

        return $data;
    }

    //
    public function check_entry_fav_wish($data, $user)
    {
        $favorites_id = $user->favorite()->pluck('mal_id')->toArray();
        $wishlist_id = $user->wishlist()->pluck('mal_id')->toArray();

        $check_items = collect($data)->map(function ($item) use ($favorites_id, $wishlist_id) {
            $item['entry']['is_favorited'] = in_array($item['entry']['mal_id'], $favorites_id);
            $item['entry']['is_wishlist'] = in_array($item['entry']['mal_id'], $wishlist_id);
            return $item;
        });

        return $check_items;
    }
}
