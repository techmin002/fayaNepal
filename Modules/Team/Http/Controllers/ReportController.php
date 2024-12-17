<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Team\Entities\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('created_at','DESC')->get();
        return view('team::report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('team::report.create');
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

            $request->image->move(public_path('upload/images/reports'), $imageName);

        }
        $file = '';
        if ($request->file)
        {
            $file = time().'.'.$request->file->extension();

            $request->file->move(public_path('upload/images/reports'), $file);

        }
        Report::create([
        'title' => $request['title'],
        'description'=> $request['description'],
        'report_type'=> $request['report_type'],
        'status' => $request['status'],
        'image' => $imageName,
        'file' => $file
    ]);
       
       return redirect()->route('reports.index')->with('success','Created Successfully');
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
        $report = Report::findOrfail($id);
        return view('team::report.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $report = Report::findOrfail($id);
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/reports'), $imageName);

        }else{
            $imageName = $report->image;
        }
        if ($request->file)
        {
            $fileName = time().'.'.$request->file->extension();

            $request->file->move(public_path('upload/images/reports'), $fileName);

        }else{
            $fileName = $report->file;
        }
        $report->update([
            'title' => $request['title'],
            'description'=> $request['description'],
            'report_type'=> $request['report_type'],
            'status' => $request['status'],
            'image' => $imageName,
            'file' => $fileName
        ]);
        
        return redirect()->route('reports.index')->with('success','Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $report = Report::findOrfail($id);
        $report->delete();
        
        return redirect()->route('reports.index')->with('success','Removed Successfully');
    }
    public function status($id)
    {
        $report = Report::findOrfail($id);
        if($report->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $report->update([
           'status' => $status 
        ]);
        return redirect()->route('reports.index')->with('success', 'Status Updated Successfully');
    }

}
