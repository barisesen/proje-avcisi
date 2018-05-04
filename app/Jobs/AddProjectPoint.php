<?php

namespace App\Jobs;

use App\Models\PointType;
use App\Models\Project;
use App\Models\ProjectPoint;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AddProjectPoint implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $point_type;
    protected $user_id;
    protected $project;


    public function __construct($id, $point_type, $user_id = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->project = Project::findOrFail($id);
        $this->point_type = PointType::where('name', $point_type)->first();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $point = new ProjectPoint();
        $point->user_id = $this->user_id;
        $point->project_id = $this->id;
        $point->point_type_id = $this->point_type->id;
        $point->point = $this->point_type->value;
        $point->save();
    }
}
