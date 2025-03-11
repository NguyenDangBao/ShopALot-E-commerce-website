<?php

namespace App\Services\Blog;

use App\Services\ServiceInterface;

interface BlogServiceInterface extends ServiceInterface
{
    public function getLatestBLogs($limit=3);
}
