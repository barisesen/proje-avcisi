<?php

namespace App\Http\Controllers\Project;

use App\Jobs\AddPoint;
use App\Jobs\AddProjectPoint;
use App\Jobs\AddUserPoint;
use App\Jobs\ProjectViewCounter;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectMedia;
use App\Models\ProjectTag;
use App\Models\ProjectTool;
use App\Models\Tag;
use App\Models\Tool;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(20);
        return $projects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('project.create', compact('categories'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $project = new Project();
        $project->category_id = $request->category_id;
        $project->title = $request->title;
        $project->content = $request->content;
        $project->user_id = auth()->user()->id;

        if ($project->save()) {
            if ($request->hasFile('images')) {
                $this->storeImages($request->images, $project->id);
            }
            $this->tags($project->id, explode(',', strtolower($request->tags)));
            $this->tools($project->id, explode(',', strtolower($request->tools)));

            AddUserPoint::dispatch(auth()->user()->id, 'create_project', $project->id);
            return redirect()->route('projects.show', ['id' => $project->id])->with('success', 'Successfully completed.');
        }
        return back()->with('error', 'Project not updated. Please try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('tags', 'tools')->findOrFail($id);
        $user_id = auth()->user()->id;
        if (!Cache::store('redis')->has("{$project->id}_{$user_id}")) {
            AddProjectPoint::dispatch($project->id, 'view_project', $user_id);
            Cache::store('redis')->put("{$project->id}_{$user_id}", true, 1440);
        }
        return $project;
//        return view('projects.show', compact('project'));
    }


    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function edit($id)
    {
        return Project::ownProject($id);
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validation($request);
        $project = Project::ownProject($id);
        $project->category_id = $request->category_id;
        $project->title = $request->title;
        $project->content = $request->content;
        if ($project->save()) {
            $tags = explode(',', strtolower($request->tags));
            $tools = explode(',', strtolower($request->tools));
            ProjectTag::whereIn('name', $tags)->delete();
            ProjectTool::whereIn('name', $tools)->delete();
            $this->tags($project->id, $tags);
            $this->tools($project->id, $tools);

            return redirect()->route('projects.show', ['id' => $project->id])->with('success', 'Successfully completed.');
        }
        return back()->with('error', 'Project not updated. Please try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::ownProject($id);
        if ($project->delete()) {
            return redirect()->route('projects.index')->with('success', 'Successfully completed.');
        }
        return back()->with('error', 'Project not deleted. Please try again');
    }

    private function validation($request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|numeric',
            'tags' => 'required|min:3',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }

    private function tags($project_id, $tags)
    {
        $tag_ids = [];
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $tag_obj = Tag::where('name', $tag);
            if ($tag_obj->exists()) {
                array_push($tag_ids, ['tag_id' => $tag_obj->first()->id, 'project_id' => $project_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            } else {
                $new_tag = new Tag();
                $new_tag->name = $tag;
                $new_tag->slug = str_slug($tag, '-');
                $new_tag->save();
                array_push($tag_ids, ['tag_id' => $new_tag->id, 'project_id' => $project_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            }
        }
        $new_project_tags = ProjectTag::insert($tag_ids);
    }

    private function tools($project_id, $tools)
    {
        $tool_ids = [];
        foreach ($tools as $tool) {
            $tool = trim($tool);
            $tool_obj = Tool::where('name', $tool);
            if ($tool_obj->exists()) {
                array_push($tool_ids, ['tool_id' => $tool_obj->first()->id, 'project_id' => $project_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            } else {
                $new_tool = new Tool();
                $new_tool->name = $tool;
                $new_tool->slug = str_slug($tool, '-');
                $new_tool->save();
                array_push($tool_ids, ['tool_id' => $new_tool->id, 'project_id' => $project_id, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
            }
        }
        $new_project_tags = ProjectTool::insert($tool_ids);
    }

    private function storeImages($images, $project_id)
    {
        foreach ($images as $image) {
            $resp = Storage::put("public/project_medias/{$project_id}", $image);
            if ($resp) {
                $photo = new ProjectMedia();
                $photo->url = $resp;
                $photo->project_id = $project_id;
                $photo->save();
            }
        }
    }
}
