<?php

namespace Modules\Notice\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notice\Entities\Procurement;

class ProcurementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $procurements = Procurement::orderBy('created_at','DESC')->get();
        return view('notice::procurement.index',compact('procurements'));
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

            $request->image->move(public_path('upload/images/procurement'), $imageName);

            
        }
        if($request->status == 'on')
        {
            $status = 'on';
        }
        else{
            $status = 'off';
        }
        $procurement = new Procurement();
        $procurement->title = $request->input('title');
        $procurement->description = $request->input('description');
        $procurement->status = $status;
        $procurement->image = $imageName;
        $procurement->save();
         return back()->with('success','Procurement Added Successfully');
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
        $procurement = Procurement::findOrfail($id);
        $imageName = $procurement->image;
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/procurement'), $imageName);

        }
        
        $procurement->title = $request->input('title');
        $procurement->status = $request->input('status') ?? $procurement->status;
        $procurement->description = $request->input('description');
        $procurement->image = $imageName;
        $procurement->save();
         return back()->with('success','Procurement Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $procurement = Procurement::findOrfail($id);
        $procurement->delete();
        return back()->with('success', 'Procurement deleted Successfully');
    
    }
    public function status($id)
    {
        $procurement = Procurement::findOrfail($id);
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
