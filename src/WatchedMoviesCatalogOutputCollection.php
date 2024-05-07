<?php

declare(strict_types=1);

namespace HexagonalArch;

class WatchedMoviesCatalogOutputCollection implements \IteratorAggregate
{
    private array $movies = [];

    public function add(WatchedMoviesCatalogOutput $movie): void
    {
        $this->movies[] = $movie;
    }

    public function remove(WatchedMoviesCatalogOutput $movie): void
    {
        $key = array_search($movie, $this->movies, true);
        if ($key !== false) {
            unset($this->movies[$key]);
        }
    }

    public function contains(WatchedMoviesCatalogOutput $movie): bool
    {
        return in_array($movie, $this->movies, true);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->movies);
    }
}
