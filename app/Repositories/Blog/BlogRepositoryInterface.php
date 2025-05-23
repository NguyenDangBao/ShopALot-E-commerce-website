<?php

namespace App\Repositories\Blog;

use App\Repositories\RepositoryInterface;

interface BlogRepositoryInterface extends RepositoryInterface
{
    public function getLatestBLogs($limit=3);
}
