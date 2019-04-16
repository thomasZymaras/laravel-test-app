<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid', 'title', 'slug', 'releaseDate', 'posterUrl', 'backdropUrl', 'plot'
    ];

    public $timestamps = false;

    /** @var string $uid */
    protected $uid;

    /** @var string $title */
    protected $title;

    /** @var string $slug */
    protected $slug;

    /** @var string $releaseDate */
    protected $releaseDate;

    /** @var string $posterUrl */
    protected $posterUrl;

    /** @var string $backdropUrl */
    protected $backdropUrl;

    /** @var string $plot */
    protected $plot;

    protected $table = 'movies';

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return Movie
     */
    public function setUid(string $uid): Movie
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Movie
     */
    public function setSlug(string $slug): Movie
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     * @return Movie
     */
    public function setReleaseDate(string $releaseDate): Movie
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosterUrl(): string
    {
        return $this->posterUrl;
    }

    /**
     * @param string $posterUrl
     * @return Movie
     */
    public function setPosterUrl(string $posterUrl): Movie
    {
        $this->posterUrl = $posterUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackdropUrl(): string
    {
        return $this->backdropUrl;
    }

    /**
     * @param string $backdropUrl
     * @return Movie
     */
    public function setBackdropUrl(string $backdropUrl): Movie
    {
        $this->backdropUrl = $backdropUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlot(): string
    {
        return $this->plot;
    }

    /**
     * @param string $plot
     * @return Movie
     */
    public function setPlot(string $plot): Movie
    {
        $this->plot = $plot;
        return $this;
    }

}
