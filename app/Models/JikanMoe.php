<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class JikanMoe extends Model
{
    // rest api : https://api.jikan.moe/v4/
    // response : page, data

    // get seasons now
    public static function getseasonNow()
    {
        try {
            $response = Http::get('https://api.jikan.moe/v4/seasons/now');

            $result = $response->json();

            return $result["data"];
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // get season year list
    // get season anime

    // top anime
    public static function getTopAnime($query)
    {

        try {
            $response = Http::get('https://api.jikan.moe/v4/top/anime', $query);

            $result = $response->json();

            return $result;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // season years
    public static function getSeasonsList()
    {

        try {
            $response = Http::get('https://api.jikan.moe/v4/seasons');

            $result = $response->json();

            if (isset($result['message'])) {
                dd($result['status'] . " : " . $result['message']);
            }

            $filter = collect($result['data'])->filter(function ($item) {
                return $item['year'] >= 1996;
            })->values();
            return $filter;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // top anime
    public static function getSeasonAnime($year, $season, $query)
    {

        try {
            $response = Http::get('https://api.jikan.moe/v4/seasons/' . $year . "/" . $season, $query);

            $result = $response->json();

            if (isset($result['message'])) {
                dd($result['status'] . " : " . $result['message']);
            }

            return $result;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // searc
    public static function getAnimeByKeywords($query)
    {

        try {
            $response = Http::get('https://api.jikan.moe/v4/anime/', $query);

            $result = $response->json();

            if (isset($result['message'])) {
                dd($result['status'] . " : " . $result['message']);
            }

            return $result;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // detail anime by mal_id
    public static function getAnimeById($mal_id)
    {
        try {
            $response = Http::get('https://api.jikan.moe/v4/anime/' . $mal_id . "/full");

            $result = $response->json();

            return $result["data"];
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // detail anime by mal_id
    public static function getRecommendById($mal_id)
    {
        try {
            $response = Http::get('https://api.jikan.moe/v4/anime/' . $mal_id . "/recommendations");

            $result = $response->json();

            return $result["data"];
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
