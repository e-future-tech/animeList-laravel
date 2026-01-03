<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Traits\checkingTrait;

class WishlistController extends Controller
{

    use checkingTrait;

    public function index(Request $request)
    {
        $user = $request->user();

        if ($user == null) {
            return Redirect()->route('/login');
        }

        try {
            $data_db = Wishlist::where('user_id', $user->user_id)->paginate(15);

            $result = $this->check_fav_wish($data_db->items(), $user);

            return view('mini_content', [
                "title" => "Wishlist",
                "content_title" => "Wishlist by : " . $user->name,
                "result" => $result,
                'filter' => 'local',
                'source' => 'local',
                "page" => $data_db
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
