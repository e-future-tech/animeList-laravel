<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Traits\checkingTrait;
use Exception;
use Illuminate\Http\Request;

class Favoritecontroller extends Controller
{

    use checkingTrait;

    //
    public function index(Request $request)
    {
        $user = $request->user();

        // atur query untuk table
        $order = $request->get('order') ? $request->get('order') : "created_at";
        $sort = $request->get('sort') ? $request->get('sort') : "desc";

        $query = [
            'user_id' => $user->user_id,
            'type' => $request->get('type') ? $request->get('type') : "none",
        ];

        $query = collect($query)->filter(function ($value, $key) {
            return $value != "none";
        })->toArray();

        try {
            $data_db = Favorite::where($query)->orderBy($order, $sort)->paginate(15)->withQueryString();

            $result = $this->check_fav_wish($data_db->items(), $user);

            return view('contents_page', [
                "title" => "Favorite",
                "content_title" => "Favorite by : " . $user->name,
                "result" => $result,
                'filter' => "local",
                "url" => '/favorites',
                'source' => 'local',
                "query" => $query,
                "page" => $data_db
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
