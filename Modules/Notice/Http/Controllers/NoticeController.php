<?php

namespace Modules\Notice\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notice\Entities\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $notices = Notice::orderBy('created_at','DESC')->get();
        return view('notice::index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('notice::create');
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

            $request->image->move(public_path('upload/images/notice'), $imageName);

            
        }
        if($request->status == 'on')
        {
            $status = 'on';
        }
        else{
            $status = 'off';
        }
        $notice = new Notice();
        $notice->title = $request->input('title');
        $notice->description = $request->input('description');
        $notice->status = $status;
        $notice->image = $imageName;
        $notice->save();
         return back()->with('success','Notice Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('notice::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('notice::edit');
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
        $notice = Notice::findOrfail($id);
        $imageName = $notice->image;
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/notice'), $imageName);

        }
        
        $notice->title = $request->input('title');
        $notice->status = $request->input('status') ?? $notice->status;
        $notice->description = $request->input('description');
        $notice->image = $imageName;
        $notice->save();
         return back()->with('success','Notice Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $notice = Notice::findOrfail($id);
        $notice->delete();
        return back()->with('success', 'Notice deleted Successfully');
    
    }
    public function status($id)
    {
        $notice = Notice::findOrfail($id);
        if($notice->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $notice->update([
           'status' => $status 
        ]);
        return back()->with('success', 'Status Updated Successfully');
    }
}
