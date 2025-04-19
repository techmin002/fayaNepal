<?php

namespace Modules\Partner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Partner\Entities\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $partners = Partner::all();
        return view('partner::partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('partner::partners.create');
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
            'type' => ['required'],
            'image' => ['required']
        ]);
        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/partners'), $imageName);

        }
        $partner = new Partner();
        $partner->title = $request->input('title');
        $partner->type = $request->input('type');
        $partner->logo = $imageName;
        $partner->save();
         return back()->with('success','Partner Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('partner::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('partner::edit');
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
            'type' => ['required'],
        ]);
        $partner = Partner::findOrfail($id);
        $imageName = $partner->logo;
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/partners'), $imageName);

        }

        $partner->title = $request->input('title');
        $partner->type = $request->input('type');
        $partner->logo = $imageName;
        $partner->save();
         return back()->with('success','Partner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $testimonial = Partner::findOrfail($id);
        $testimonial->delete();
        return back()->with('success', 'Partner deleted Successfully');

    }
    public function status($id)
    {
        $testimonial = Partner::findOrfail($id);
        if($testimonial->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $testimonial->update([
           'status' => $status
        ]);
        return back()->with('success', 'Status Updated Successfully');
    }

    public function partnersWithDonors()
{
    $partners = Partner::with('donors')->get();
    // return view('partners.donorpartner', compact('partners'));
    return view('partner::partners.partneranddonor', compact('partners'));

}

}

