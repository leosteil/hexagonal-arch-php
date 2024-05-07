<?php

declare(strict_types=1);

namespace HexagonalArch;

final class WatchedMoviesCatalogOutput
{
    public function __construct(
        public readonly string $movieName,
        public readonly string $watchedAt, public readonly float $imdbRate
    ){}
}
