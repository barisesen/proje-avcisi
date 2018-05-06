<?php

namespace App\Jobs;

use App\Models\Feed;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AddFeed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;
    protected $project_id;
    protected $event;
    protected $rel_id;

    /**
     * AddFeed constructor.
     * @param $project_id
     * @param $user_id
     * @param $event
     */
    public function __construct($project_id, $user_id, $event, $rel_id = null)
    {
        $this->project_id = $project_id;
        $this->user_id = $user_id;
        $this->event = $event;
        $this->rel_id = $rel_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $feed = new Feed();
        $feed->user_id = $this->user_id;
        $feed->project_id = $this->project_id;
        $feed->event = $this->event;
        $feed->save();
    }
}
