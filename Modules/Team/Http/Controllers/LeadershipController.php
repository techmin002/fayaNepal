<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\Leadership;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $leaderships = Leadership::orderBy('created_at','DESC')->get();
        return view('team::leadership.index', compact('leaderships'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('team::leadership.create');
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

            $request->image->move(public_path('upload/images/leaderships'), $imageName);

        }
        Leadership::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'phone' => $request['phone'],
        'designation' => $request['designation'],
        'introduction'=> $request['introduction'],
        'status' => $request['status'],
        'image' => $imageName
    ]);
       
       return redirect()->route('leaderships.index')->with('success','Created Successfully');
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
        $leadership = Leadership::findOrfail($id);
        return view('team::leadership.edit',compact('leadership'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $leadership = Leadership::findOrfail($id);
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/leaderships'), $imageName);

        }else{
            $imageName = $leadership->image;
        }
        $leadership->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'designation' => $request['designation'],
            'introduction'=> $request['introduction'],
            'status' => $request['status'],
            'image' => $imageName
        ]);
        
        return redirect()->route('leaderships.index')->with('success','Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $team = Leadership::findOrfail($id);
        $team->delete();
        
        return redirect()->route('leaderships.index')->with('success','Removed Successfully');
    }
    public function status($id)
    {
        $team = Leadership::findOrfail($id);
        if($team->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $team->update([
           'status' => $status 
        ]);
        return redirect()->route('leaderships.index')->with('success', 'Status Updated Successfully');
    }
}
