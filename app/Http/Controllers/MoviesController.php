<?php
/**
 * Created by PhpStorm.
 * User: we.praktikant
 * Date: 16.04.2019
 * Time: 15:15
 */

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Support\Facades\DB;

/**
 * Class MoviesController
 * @package App\Http\Controllers
 */
class MoviesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('movies.index', ['movies' => Movie::all()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($uid)
    {
        /** @var Movie $movie */
        $movie = DB::table('movies')->where('uid', $uid)->first();

        if (null === $movie) {
            return view('not_found');
        }

        return view("movies.detail", ['movie', $movie]);
    }

}