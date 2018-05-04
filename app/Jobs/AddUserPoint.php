<?php

namespace App\Jobs;

use App\Models\Point;
use App\Models\PointType;
use App\Models\UserPoint;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AddUserPoint implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $point_type;
    protected $user;
    protected $project_id;


    public function __construct($id, $point_type, $project_id = null)
    {
        $this->id = $id;
        $this->project_id = $project_id;
        $this->user = User::findOrFail($id);
        $this->point_type = PointType::where('name', $point_type)->first();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $point = new UserPoint();
        $point->user_id = $this->id;
        $point->project_id = $this->project_id;
        $point->point_type_id = $this->point_type->id;
        $point->point = $this->point_type->value;
        $point->save();
    }
}
