<?php

namespace App\Services\Blog;

use App\Repositories\Blog\BlogRepositoryInterface;
use App\Services\BaseService;

class BlogService extends BaseService implements BlogServiceInterface
{

    public $repository;

    public function __construct(BlogRepositoryInterface $BlogRepository)
    {

        $this->repository = $BlogRepository;
    }

    public function getLatestBLogs($limit=3){
        return $this->repository->getLatestBlogs($limit);
    }
    public function findBySlug($slug)
    {
        return $this->repository->findBySlug($slug);
    }


}
