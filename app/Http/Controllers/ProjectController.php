<?php

namespace App\Http\Controllers;



use App\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function index()
    {
    	$projects = project::all();
        
    	return view ('/project.project', compact('projects'));
    }

    public function create()
    {
    	return view('project/create');
    }

    public function store()
    {
    	$project = new Project();

    	$project->title = request('title');

    	$project->description = request('description');
    	$project->save();

    	return redirect('project');
    }
    /**
     * { function_description }
     *
     * @return 
     */
    public function edit($id)
    {
      $project = project::findOrfail($id);
      return view('project.edit', compact('project'));
    }

    /**
     * Updates the object.
     */

    public function update(Request $request, $id)

    {
        $project = project::findOrfail($id);

        $project->description = request('description');
        $project->title = request('title');
        $project->save();

        return redirect('project');
    }

    /**
     * { function_description }
     *
     * @param      <type>  $id     The identifier
     *
     * @return     <type>  ( description_of_the_return_value )
     */
    public function show($id)

    {
         $project = project::findOrfail($id);

         return view('project.show', compact('project'));
    }

    /**
     * Destroys the given identifier.
     *
     * @param      <type>  $id     The identifier
     */
    public function destroy($id)
    {
      project::findOrfail($id)->delete($id);
    
      return redirect('project');
    }

}
