<?php

class ProjectsController extends \BaseController {

	public function getProjects() {
		$projects = Projects::all();

		return View::make('admin.projects')->with('projects', $projects);
	}
}