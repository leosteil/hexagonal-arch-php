<?php

namespace HexagonalArch\Repository;

use HexagonalArch\Filters;

interface WatchedMoviesRepository
{
    public function getWatchedMovies(Filters $filters): WatchedMoviesCollection;
}
