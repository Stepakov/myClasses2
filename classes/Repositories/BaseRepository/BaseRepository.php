<?php

namespace classes\Repositories\BaseRepository;

use interfaces\RepositoryInterface\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    abstract public function getData(): array;
}