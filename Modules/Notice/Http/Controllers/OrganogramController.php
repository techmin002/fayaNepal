<?php

namespace Modules\Notice\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notice\Entities\Organogram;

class OrganogramController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $organograms = Organogram::orderBy('created_at','DESC')->get();
        return view('notice::organogram.index',compact('organograms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('notice::procurement.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => ['required'],
        ]);
        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/organograms'), $imageName);

            
        }
        if($request->status == 'on')
        {
            $status = 'on';
        }
        else{
            $status = 'off';
        }
        $procurement = new Organogram();
        $procurement->title = $request->input('title');
        $procurement->status = $status;
        $procurement->image = $imageName;
        $procurement->save();
         return back()->with('success','Organograms Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('notice::procurement.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('notice::procurement.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
        ]);
        $procurement = Organogram::findOrfail($id);
        $imageName = $procurement->image;
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/organograms'), $imageName);

        }
        
        $procurement->title = $request->input('title');
        $procurement->status = $request->input('status') ?? $procurement->status;
        $procurement->image = $imageName;
        $procurement->save();
         return back()->with('success','Organograms Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $procurement = Organogram::findOrfail($id);
        $procurement->delete();
        return back()->with('success', 'Organograms deleted Successfully');
    
    }
    public function status($id)
    {
        $procurement = Organogram::findOrfail($id);
        if($procurement->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $procurement->update([
           'status' => $status 
        ]);
        return back()->with('success', 'Status Updated Successfully');
    }
}
