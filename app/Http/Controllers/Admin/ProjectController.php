<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $rules;
    public $messages;

    public function __construct()
    {
        $this->rules = [
            'title' => 'required|min:5|max:15',
            'description' => 'required|min:15',
            'author' => 'required',
            'argument' => 'required|min:5|max:100',
            'start_date' => 'required',
            'concluded' => 'required',
        ];

        $this->messages = [
            'title.required' => 'Inserisci un titolo',
            'title.min' => 'Il titolo è troppo corto',
            'title.max' => 'Riduci i caratteri del titolo',

            'description.required' => 'Serve una descrizione',
            'description.min' => 'Lunghezza insufficente per la descrizione',

            'author.required' => 'E\' necessario un autore',

            'argument.required' => 'Inserire l\'argomento',
            'argument.min' => 'Argomento troppo corto',
            'argument.max' => 'Ridurre la lunghezza dell\'argomento',

            'start_date.required' => 'Serve una data',

            'concluded.required' => 'Inserire lo stato del progetto',
        ];
    }

    public function index()
    {
        //
        $projects = Project::paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate($this->rules, $this->messages);

        $data['author'] = Auth::user()->name;
        $data['slug'] = Str::slug($data['title']);
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.index')->with('message', "The project $newProject->title has been created succesfully")->with('message_class', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData = $request->all();

        $request->validate($this->rules, $this->messages);

        $project = Project::findOrFail($id);

        $project->update($formData);

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "This element $project->title has been removed")->with('message_class', 'danger');
    }
}
