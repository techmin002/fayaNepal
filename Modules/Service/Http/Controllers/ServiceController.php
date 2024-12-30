<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Service\Entities\Service;
use Modules\Service\Http\Requests\StoreServiceRequest;
use Modules\Service\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Str;
use Modules\Partner\Entities\Partner;
use Modules\Service\Entities\Program;
use Modules\Service\Entities\ProgramCategory;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $services = Program::orderBy('created_at','DESC')->get();
        return view('service::service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $sectors = ProgramCategory::orderBy('created_at','DESC')->get();
        $partners = Partner::where('status','on')->get();
        return view('service::service.create', compact('sectors','partners'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreServiceRequest $request)
    {
        // dd($request->all());
        
        // if($request['icon'])
        // {
        //     $imageName = time().'.'.$request->icon->extension();

        //     $request->icon->move(public_path('upload/images/services'), $imageName);
        // }
        if($request->image)
        {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/images/services'), $image);
        }
        $slug = Str::slug($request->title);
        Program::create([
            'title' => $request->title,
            'slug' => $slug,
            'icon' => $request->completion_percentage,
            'category_id' => $request->category_id,
            'image' => $image,
            'shortdescription' => $request->shortDescription,
            'description' => $request->description,
            'program_type' => $request->program_type,
            'partner_id' => $request->partner_id,
            'date' => $request->date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'status' => $request->status
        ]);
        return redirect()->route('programs.index')->with('success','Program Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('service::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $service = Program::findOrfail($id);
        $sectors = ProgramCategory::orderBy('created_at','DESC')->get();
        $partners = Partner::where('status','on')->get();
        return view('service::service.edit',compact('service','sectors','partners'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        $service= Program::findOrfail($id);
        // if($request['icon'])
        // {
        //     $imageName = time().'.'.$request->icon->extension();

        //     $request->icon->move(public_path('upload/images/services'), $imageName);
        // }else{
        //     $imageName = $service->icon;
        // }
        if($request->image)
        {
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/images/services'), $image);
        }else{
            $image = $service->image;
        }
        if($request['status'] == 'on')
        {
            $status = 'on';
        }else{
            $status = 'off';
        }
        if($request->title)
        {
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug($service->title);
        }
        $service->update([
            'title' => $request->title,
            'slug' => $slug,
            'icon' => $request->completion_percentage,
            'category_id' => $request->category_id,
            'image' => $image,
            'shortdescription' => $request->shortDescription,
            'description' => $request->description,
            'program_type' => $request->program_type,
            'partner_id' => $request->partner_id,
            'date' => $request->date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'status' => $status
        ]);
        return redirect()->route('programs.index')->with('success','Program Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $service= Program::findOrfail($id);
        $service->delete();
        return redirect()->back()->with('success','Program Deleted!');
    }
    public function Status($id)
    {
        $service= Program::findOrfail($id);
        if($service->status == 'on')
        {
            $status ='off';
        }else{
            $status ='on';
        }
        $service->update([
            'status' => $status
        ]);
        return redirect()->back()->with('success','Program Updated!');
    }
}
