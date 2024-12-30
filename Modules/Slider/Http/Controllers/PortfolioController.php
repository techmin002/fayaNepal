<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slider\Entities\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $portfolio = Portfolio::first();
        return view('slider::portfolio.index', compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('slider::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $portfolio = new Portfolio();
        $portfolio->portfolio = $request['portfolio'];
        $portfolio->beneficiary_direct = $request['beneficiary_direct'];
        $portfolio->beneficiary_indirect = $request['beneficiary_indirect'];
        $portfolio->project = $request['project'];
        $portfolio->save();
        return back()->with('success','Protfolio Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('slider::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('slider::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrfail($id);
        $portfolio->portfolio = $request['portfolio'];
        $portfolio->beneficiary_direct = $request['beneficiary_direct'];
        $portfolio->beneficiary_indirect = $request['beneficiary_indirect'];
        $portfolio->project = $request['project'];
        $portfolio->save();
        return back()->with('success','Protfolio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
