<?php

namespace HexagonalArch;

interface IMDBGateway
{
    public function getImdb(string $movieId): float;
}
