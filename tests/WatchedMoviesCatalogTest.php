<?php

namespace tests;

use HexagonalArch\Filters;
use HexagonalArch\IMDBGateway;
use HexagonalArch\Repository\WatchedMovie;
use HexagonalArch\Repository\WatchedMoviesCollection;
use HexagonalArch\Repository\WatchedMoviesRepository;
use HexagonalArch\WatchedMoviesCatalog;
use HexagonalArch\WatchedMoviesCatalogOutput;
use PHPUnit\Framework\TestCase;

class WatchedMoviesCatalogTest extends TestCase
{
    public function testWatchedMoviesCatalogMustReturnAllMovies(): void
    {
        $repositoryStub = $this->createMock(WatchedMoviesRepository::class);
        $watchedMoviesCollection = new WatchedMoviesCollection();
        $watchedMoviesCollection->add(new WatchedMovie('Fast and Furious', '2024-02-1', 'tt123456'));
        $repositoryStub->expects($this->once())
            ->method('getWatchedMovies')
            ->willReturn($watchedMoviesCollection);

        $imdbGatewayStub = $this->createMock(IMDbGateway::class);
        $imdbGatewayStub->expects($this->once())
            ->method('getImdb')
            ->willReturn(7.4);
        $watchedMoviesCatalog = new WatchedMoviesCatalog($repositoryStub, $imdbGatewayStub);

        $catalog = $watchedMoviesCatalog->execute(new Filters());
        /** @var WatchedMoviesCatalogOutput $firstMovie */
        $firstMovie = $catalog->getIterator()[0];

        $this->assertEquals('Fast and Furious', $firstMovie->movieName);
        $this->assertEquals('2024-02-1', $firstMovie->watchedAt);
        $this->assertEquals(7.4, $firstMovie->imdbRate);
    }
}
