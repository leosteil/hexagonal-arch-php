<?php

declare(strict_types=1);

namespace HexagonalArch;

class Filters
{
    public function __construct(public readonly ?string $category = null)
    {
    }
}
