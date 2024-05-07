<?php

declare(strict_types=1);

namespace HexagonalArch\Repository;

class WatchedMoviesCollection implements \IteratorAggregate
{
    private array $movies = [];

    public function add(WatchedMovie $movie): void
    {
        $this->movies[] = $movie;
    }

    public function remove(WatchedMovie $movie): void
    {
        $key = array_search($movie, $this->movies, true);
        if ($key !== false) {
            unset($this->movies[$key]);
        }
    }

    public function contains(WatchedMovie $movie): bool
    {
        return in_array($movie, $this->movies, true);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->movies);
    }
}
