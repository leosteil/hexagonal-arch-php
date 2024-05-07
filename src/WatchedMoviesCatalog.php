<?php

declare(strict_types=1);

namespace HexagonalArch;

use HexagonalArch\Repository\WatchedMovie;
use HexagonalArch\Repository\WatchedMoviesRepository;

class WatchedMoviesCatalog
{
    public function __construct(
        private readonly WatchedMoviesRepository $repository,
        private readonly IMDBGateway $IMDBGateway
    ){}

    public function execute(Filters $filters): WatchedMoviesCatalogOutputCollection
    {
        $watchedMovies = $this->repository->getWatchedMovies($filters);
        $output = new WatchedMoviesCatalogOutputCollection();

        /* @var WatchedMovie $watchedMovie */
        foreach ($watchedMovies as $watchedMovie) {
            $imdb = $this->IMDBGateway->getImdb($watchedMovie->imdbId);
            $output->add(new WatchedMoviesCatalogOutput($watchedMovie->name, $watchedMovie->watchedAt, $imdb));
        }

        return $output;
    }
}
