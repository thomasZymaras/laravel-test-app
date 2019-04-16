<?php

namespace App\Console\Commands;

use App\Services\MoviesApiHttpClient;
use App\Services\MoviesImporter;
use GuzzleHttp\Exception\TransferException;
use Illuminate\Console\Command;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class ImportMovies
 * @package App\Console\Commands
 */
class ImportMovies extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports movies from API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param MoviesApiHttpClient $httpClient
     * @param MoviesImporter $moviesImporter
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(MoviesApiHttpClient $httpClient, MoviesImporter $moviesImporter)
    {
        $this->info('Starting import');
        $this->info('Fetching movies data...');

        try {
            $moviesData = $httpClient->getAllMovies();
        } catch (TransferException $exception) {
            $this->error($exception->getMessage());
        }

        $this->info('Importing data');
        $moviesImporter->import($moviesData);
    }

}
