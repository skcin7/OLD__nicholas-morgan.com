<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectsController extends Controller
{
    /**
     * Show projects page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projectsQuery = Project::from('projects');

        return view('admin.projects')
            ->with('title_prefix', 'Projects')
            ->with('projects', $projectsQuery->paginate($this->perPage));
    }

    /**
     * Create a generic project (edit later).
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $project = new Project();
        $project->save();

        return redirect('admin/projects')
            ->with('flash_message', [
                'message' => 'Project created!',
            ]);
    }

    private function getProjectByID($projectID)
    {
        if(is_null($projectID)) {
            $project = new Project();
        }
        else {
            $project = Project::find($projectID);
            abort_if(! $project, 404, 'Project can not be found.');
        }
        return $project;
    }

    /**
     * Show a project.
     *
     * @param Request $request
     * @param null $projectID
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $projectID = null)
    {
        $project = $this->getProjectByID($projectID);

        return view('admin.project')
            ->with('title_prefix', 'Project')
            ->with('project', $project);
    }

    /**
     * Save a project.
     *
     * @param Request $request
     * @param null $projectID
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request, $projectID = null)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'nullable|string',
            'dates_completed' => 'nullable|string',
            'built_with' => 'nullable|string',
            'notes' => 'nullable|string',
            'published' => 'nullable',
        ]);

        $project = $this->getProjectByID($projectID);
        $project->fill($request->all());
        $project->save();

        return redirect('admin/projects/' . $project->id)
            ->with('flash_message', [
                'message' => 'Project has been saved!',
            ]);
    }

}
