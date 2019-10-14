<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Project;

class ProjectsController extends Controller
{
    /**
     * Show projects page.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProjects(Request $request)
    {
        $projectsQuery = Project::from('projects');

        return view('projects')
            ->with('title_prefix', 'Projects')
            ->with('projects', $projectsQuery->paginate($this->perPage));
    }

}
