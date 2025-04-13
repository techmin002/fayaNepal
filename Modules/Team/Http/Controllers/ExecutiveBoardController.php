<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\ExecutiveBoard;

class ExecutiveBoardController extends Controller
{
    public function index()
    {
        $executives = ExecutiveBoard::orderBy('created_at','DESC')->get();
        return view('team::executive.index', compact('executives'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('team::executive.create');
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

            $request->image->move(public_path('upload/images/executives'), $imageName);

        }
        ExecutiveBoard::create([
        'name' => $request['name'],
        'position' => $request['position'],
        'designation' => $request['designation'],
        'phone' => $request['phone'],
        'email' => $request['email'],
        'status' => $request['status'],
        'image' => $imageName
    ]);

       return redirect()->route('executives.index')->with('success','Created Successfully');
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
        $executive = ExecutiveBoard::findOrfail($id);
        return view('team::executive.edit',compact('executive'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $leadership = ExecutiveBoard::findOrfail($id);
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/executives'), $imageName);

        }else{
            $imageName = $leadership->image;
        }
        $leadership->update([
            'name' => $request['name'],
            'position' => $request['position'],
            'designation' => $request['designation'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'status' => $request['status'],
            'image' => $imageName
        ]);

        return redirect()->route('executives.index')->with('success','Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $team = ExecutiveBoard::findOrfail($id);
        $team->delete();

        return redirect()->route('executives.index')->with('success','Removed Successfully');
    }
    public function status($id)
    {
        $team = ExecutiveBoard::findOrfail($id);
        if($team->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $team->update([
           'status' => $status
        ]);
        return redirect()->route('executives.index')->with('success', 'Status Updated Successfully');
    }
}
