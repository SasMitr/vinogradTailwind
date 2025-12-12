<?php

namespace App\Jobs;

use App\UseCases\PostContentService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Database\Eloquent\Model;

class ContentProcessing implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Model $model
    ){}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        new PostContentService($this->model);
    }
}
