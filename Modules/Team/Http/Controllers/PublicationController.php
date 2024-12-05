<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\Publication;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $publications = Publication::orderBy('created_at','DESC')->get();
        return view('team::publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('team::publication.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/publications'), $imageName);

        }
        $file = '';
        if ($request->file)
        {
            $file = time().'.'.$request->file->extension();

            $request->file->move(public_path('upload/images/publications'), $file);

        }
        Publication::create([
        'title' => $request['title'],
        'description'=> $request['description'],
        'status' => $request['status'],
        'image' => $imageName,
        'file' => $file
    ]);
       
       return redirect()->route('publications.index')->with('success','Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('team::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $publication = Publication::findOrfail($id);
        return view('team::publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $publication = Publication::findOrfail($id);
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/publications'), $imageName);

        }else{
            $imageName = $publication->image;
        }
        if ($request->file)
        {
            $fileName = time().'.'.$request->file->extension();

            $request->file->move(public_path('upload/images/publications'), $fileName);

        }else{
            $fileName = $publication->file;
        }
        $publication->update([
            'title' => $request['title'],
            'description'=> $request['description'],
            'status' => $request['status'],
            'image' => $imageName,
            'file' => $fileName
        ]);
        
        return redirect()->route('publications.index')->with('success','Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $publication = Publication::findOrfail($id);
        $publication->delete();
        
        return redirect()->route('publications.index')->with('success','Removed Successfully');
    }
    public function status($id)
    {
        $publication = Publication::findOrfail($id);
        if($publication->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $publication->update([
           'status' => $status 
        ]);
        return redirect()->route('publications.index')->with('success', 'Status Updated Successfully');
    }
}
