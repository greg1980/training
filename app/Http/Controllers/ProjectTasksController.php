<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task)
    {
        
      $task->update([
        'completed' => request()->has('completed')
      ]);

      return back();
    }
    
    public function store(Project $project)
    { 
        $this->validate(request(),[
          'description' => 'required'
        ]);
      Task::create([
       'project_id' => $project->id,
       'description' => request('description')

      ]);

      return back();
    }
   
}
