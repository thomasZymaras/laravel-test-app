<?php
/**
 * Created by PhpStorm.
 * User: we.praktikant
 * Date: 16.04.2019
 * Time: 13:17
 */

namespace App\Services;


use App\Movie;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

/**
 * Class MoviesImporter
 * @package App\Services
 */
class MoviesImporter
{

    /**
     * @param array $moviesData
     * @throws \Exception
     */
    public function import(array $moviesData)
    {
        foreach ($moviesData as $movie) {
            /** @var Movie $existingMovie */
            $existingMovie = DB::table('movies')->where('uid', $movie['_id'])->first();
            if (null === $existingMovie) {
                $existingMovie = new Movie();
                $existingMovie->uid = $movie['_id'];
            }

            $releaseDate = new \DateTime($movie['releaseDate'], new \DateTimeZone('Europe\Berlin'));

            $existingMovie->title       = $movie['title'];
            $existingMovie->slug        = $movie['slug'];
            $existingMovie->releaseDate = $releaseDate;
            $existingMovie->posterURL   = $movie['posterURL'];
            $existingMovie->backdropUrl = $movie['backdropURL'];
            $existingMovie->plot        = $movie['plot'];

            $existingMovie->save();
        }
    }

}