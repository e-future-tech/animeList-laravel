<?php

namespace App\Http\Controllers;

use App\Models\JikanMoe;
use App\Traits\checkingTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{

    use checkingTrait;

    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    // home, season now
    public function home()
    {
        try {
            $result = JikanMoe::getseasonNow();

            return view('home', [
                "title" => "Home",
                "seasonNow" => $result
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // top
    public function top(Request $request)
    {

        $view = 'top';

        $query = collect([
            'page' => $request->get('page') ? $request->get('page') : 1,
            'filter' => $request->get('filter') ? $request->get('filter') : null,
            'type' => $request->get('type') ? $request->get('type') : null,
            'limit' => 12
        ]);

        if ($query->get('filter') != null) {
            $view = 'contents_page';
        }

        try {
            $data_db = JikanMoe::getTopAnime($query->all());

            // changer : result to data_db, page
            $result = $data_db['data'];

            if ($this->user != null) {
                $result = $this->check_fav_wish($data_db["data"], $this->user);
            }

            $filter = $query->except(['page']);

            return view($view, [
                "title" => "Top Anime",
                "url" => "/top",
                "content_title" => "top Anime",
                "result" => $result,
                'source' => 'jikan',
                'filter' => 'mini',
                'key_filter' => 'type',
                "url" => "top",
                "query" => $filter,
                "page" => $data_db['pagination']
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // year
    public function seasonYears()
    {
        try {
            $result = JikanMoe::getSeasonsList();

            return view('season_year', [
                "title" => "Season Years",
                "content_title" => 'Seasons List',
                "result" => $result
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // list anime by seasons
    public function seasonAnime(Request $request, $year, $season)
    {

        $query = collect([
            'page' => $request->get('page') ? $request->get('page') : 1,
            'filter' => $request->get('filter') ? $request->get('filter') : null,
            'limit' => 12
        ]);

        try {
            $data_db = JikanMoe::getSeasonAnime($year, $season, $query->all());

            // changer : result to data_db, page
            $result = $data_db['data'];

            if ($this->user != null) {
                $result = $this->check_fav_wish($data_db["data"], $this->user);
            }

            $filter = $query->except(['page']);

            return view('contents_page', [
                "title" => $season . ' ' .   $year,
                "content_title" => $season . ' ' .   $year,
                "result" => $result,
                'source' => 'jikan',
                'filter' => 'mini',
                'key_filter' => 'filter',
                "url" => "/seasons/" . $year . "/" . $season,
                "query" => $filter,
                "page" => $data_db['pagination']
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // list anime by search
    public function search(Request $request)
    {

        $query = [
            'limit' => 12,
            'q' => $request->get('q') != null ? $request->get('q') : "none",
            'type' => $request->get('type') != null ? $request->get('type') : "none",
            'status' => $request->get('status') != null ? $request->get('status') : "none",
            'order_by' => $request->get('order_by') != null ? $request->get('order_by') : "none",
            'sort' => $request->get('sort') != null ? $request->get('sort') : "none",
            'page' => $request->get('page') != null ? $request->get('page') : "none"
        ];

        $query = collect($query)->filter(function ($value, $key) {
            return $value != "none";
        });

        try {

            $data_db = JikanMoe::getAnimeByKeywords($query->all());

            // changer : result to data_db, page
            $result = $data_db['data'];

            if ($this->user != null) {
                $result = $this->check_fav_wish($data_db["data"], $this->user);
            }

            $filter = $query->except(['page']);

            return view('contents_page', [
                "title" => "Search",
                "content_title" => "Search result.",
                "result" => $result,
                'source' => 'jikan',
                'filter' => null,
                "url" => "/search",
                "query" => $filter,
                "page" => $data_db['pagination']
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // detail
    public function detail($mal_id)
    {
        try {
            $data_db = JikanMoe::getAnimeById($mal_id);

            // changer : result to data_db, page
            $result = $data_db;

            if ($this->user != null) {
                $result = $this->check_single_fav_wish($data_db, $this->user);
            }


            return view('detail', [
                "title" => "Anime Detail",
                "source" => "jikan",
                "result" => $result
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // recommendations by id
    public function recommendations($mal_id, $name)
    {
        try {
            $data_db = JikanMoe::getRecommendById($mal_id);

            // changer : result to data_db, page
            $result = $data_db;

            if ($this->user != null) {
                $result = $this->check_entry_fav_wish($data_db, $this->user);
            }

            return view('mini_content', [
                "title" => "Recommendations",
                "content_title" => 'If you like ' . $name . ', we got recommendations for you',
                "source" => "jikan",
                "result" => $result
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
