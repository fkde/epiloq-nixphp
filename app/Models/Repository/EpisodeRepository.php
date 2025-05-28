<?php

namespace App\Models\Repository;

use App\Models\Episode;
use NixPHP\ORM\Repository\AbstractRepository;
use function NixPHP\ORM\em;

class EpisodeRepository extends AbstractRepository
{
    protected function getEntityClass(): string
    {
        return Episode::class;
    }

    public function saveEpisode(Episode $episode): void
    {
        em()->save($episode);
    }
}