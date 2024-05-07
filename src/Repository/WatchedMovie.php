<?php

declare(strict_types=1);

namespace HexagonalArch\Repository;

final class WatchedMovie
{
    public function __construct(
        public readonly string $name,
        public readonly string $watchedAt,
        public readonly string $imdbId
    ) {
    }
}
