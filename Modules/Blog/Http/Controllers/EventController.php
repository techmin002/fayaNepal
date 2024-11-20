<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $events = Event::all();
        return view('blog::events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::events.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $imageName = '';
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/events'), $imageName);

        }
        Event::create([
            'title' => $request['title'],
            'location' => $request['location'],
            'date' => $request['date'],
            'shortdescription'=> $request['shortdescription'],
            'description' => $request['description'],
            'status' => $request['status'],
            'image' => $imageName,
        ]);
        return redirect()->route('events.index')->with('success','Event Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $event = Event::findOrfail($id);
        return view('blog::events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrfail($id);
        $imageName = $event->image;
        if ($request->image)
        {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('upload/images/events'), $imageName);

        }
        $event->update([
            'title' => $request['title'],
            'location' => $request['location'],
            'date' => $request['date'],
            'shortdescription'=> $request['shortdescription'],
            'description' => $request['description'],
            'status' => $request['status'],
            'image' => $imageName,
        ]);
        return redirect()->route('events.index')->with('success','Event Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $blog = Event::findOrfail($id);
        $blog->delete();
        return redirect()->route('events.index')->with('success', 'Deleted Successfully');
    }
    public function status($id)
    {
        $blog = Event::findOrfail($id);
        if($blog->status == 'on')
        {
            $status = 'off';
        }else{
            $status = 'on';
        }
        $blog->update([
           'status' => $status 
        ]);
        return redirect()->route('events.index')->with('success', 'Status Updated Successfully');
    } 
}
