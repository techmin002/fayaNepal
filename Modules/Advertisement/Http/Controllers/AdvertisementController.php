<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Advertisement\DataTables\AdvertisementDataTable;
use Modules\Advertisement\Entities\Advertisemment;
use Modules\Advertisement\Entities\Story;
use Modules\Advertisement\Http\Requests\StoreAdvertisementRequest;
use Modules\Advertisement\Http\Requests\UpdateAdvertisementRequest;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // abort_if(Gate::denies('show_advertisements'), 403);
        $ads = Story::latest()->get();
        return view('advertisement::advertisements.index',compact("ads"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    { 
        // abort_if(Gate::denies('create_advertisements'), 403);
        return view('advertisement::advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreAdvertisementRequest $request)
    {
        // abort_if(Gate::denies('create_advertisements'), 403);
        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/advertisements'), $imageName);

        }
        Story::create([
            'title' => $request['title'],
            'date' => $request['date'],
            'shortdescription'=> $request['shortdescription'],
            'description' => $request['description'],
            'status' => $request['status'],
            'image' => $imageName,
        ]);
        return redirect()->route('stories.index')->with('success','Story Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        abort_if(Gate::denies('edit_advertisements'), 403);
        $advertisement = Story::findOrfail($id);
        return view('advertisement::advertisements.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateAdvertisementRequest $request, $id)
    {
        abort_if(Gate::denies('edit_advertisements'), 403);
        $advertisement = Story::findOrfail($id);
        $imageName = $advertisement->image;
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images/advertisements'), $imageName);

        }
        $advertisement->update([
            'title' => $request['title'],
            'date' => $request['date'],
            'shortdescription'=> $request['shortdescription'],
            'description' => $request['description'],
            'status' => $request['status'],
            'image' => $imageName,
        ]);
       
        return redirect()->route('stories.index')->with('success','Story Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('delete_advertisements'), 403);
        $advertisement = Story::findOrfail($id);
        $advertisement->delete();
        
        return redirect()->route('stories.index')->with('success','Removed Successfully');
    }

    public function status($id)
    {
        abort_if(Gate::denies('access_advertisements'), 403);
        $advertisement = Story::findOrfail($id);
        if($advertisement->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $advertisement->update([
           'status' => $status 
        ]);
        return redirect()->route('stories.index')->with('success', 'Status Updated Successfully');
    }
}
