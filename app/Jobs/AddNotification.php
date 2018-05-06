<?php

namespace App\Jobs;

use App\Models\Notification;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AddNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $actor;
    protected $user_id;
    protected $event;
    protected $project_id;

    public function __construct($actor, $user_id, $event, $project_id = null)
    {
        $this->actor = $actor;
        $this->user_id = $user_id;
        $this->event = $event;
        $this->project_id = $project_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->user_id != 'followers') {
            $notif = new Notification();
            $notif->actor = $this->actor;
            $notif->user_id = $this->user_id;
            $notif->event = $this->event;
            $notif->project_id = $this->project_id;
            $notif->save();
            return;
        }

        $user = User::findOrFail($this->actor);
        $followers_ids = $user->followers()->pluck('follower_id');

        $query = [];
        foreach ($followers_ids as $followers_id) {
            array_push($query, ['actor' => $this->actor, 'user_id' => $followers_id, 'event' => $this->event, 'project_id' => $this->project_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
        Notification::insert($query);
    }
}
