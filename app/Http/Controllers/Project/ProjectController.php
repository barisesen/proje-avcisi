<?php

namespace App\Http\Controllers\Project;

use App\Jobs\AddPoint;
use App\Jobs\AddProjectPoint;
use App\Jobs\AddUserPoint;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $project = Project::findOrFail($id);
        AddProjectPoint::dispatch($id, 'view_project', auth()->user()->id);
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
        ]);
    }
}
