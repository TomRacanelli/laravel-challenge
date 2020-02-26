<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Resource;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();

        return view('resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('resources.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_id'=>'exists:groups,id|integer',
            'name'=>'required|min:1|max:16|unique:resources,name',
            'description'=> 'max:255',
        ]);
        $resource = new Resource([
            'group_id' => $request->get('group_id'),
            'name' => $request->get('name'),
            'description'=> $request->get('description')
        ]);
        $resource->save();
        return redirect('/resources')->with('success', 'Resource has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::all();
        $resource = Resource::find($id);

        return view('resources.edit', compact('resource', 'groups'));
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
        $request->validate([
            'group_id'=>'exists:groups,id|integer',
            'name'=>'required|min:1|max:16|unique:resources,name,'.$id,
            'description'=> 'max:255'
        ]);

        $resource = Resource::find($id);
        $resource->group_id = $request->get('group_id');
        $resource->name = $request->get('name');
        $resource->description = $request->get('description');
        $resource->save();

        return redirect('/resources')->with('success', 'Resource has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Resource::find($id);
        $res->delete();

        return redirect('/resources')->with('success', 'Resource has been deleted Successfully');
    }
}
