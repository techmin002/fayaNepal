<?php
namespace Modules\Partner\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Partner\Entities\Donor;
use Modules\Partner\Entities\Partner;
use Modules\Partner\Http\Controllers\paertnerController;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::with('partner')->latest()->get();
        return view('partner::donors.index', compact('donors'));
    }

    public function create()
    {
        $partners = Partner::where('status', 'on')->get(); // Only active partners
        return view('partner::donors.create', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['status'] = $request->input('status') === 'on' ? 'on' : 'off'; // Ensure valid status

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            // Ensure the directory exists
            $imagePath = public_path('upload/images/donors');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }

            $request->image->move($imagePath, $imageName);

            $data['image'] = $imageName; // Only store the image name in the database
        }

        Donor::create($data);

        return redirect()->route('donors.index')
            ->with('success', 'Donor created successfully.');
    }

    public function show($id)
    {
        // $donor = Donor::with('partner')->findOrFail($id);
        // return view('partner::donors.show', compact('donor'));
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        $partners = Partner::where('status', 'on')->get(); // Only active partners
        return view('partner::donors.edit', compact('donor', 'partners'));
    }

    public function update(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);

        $request->validate([
            'partner_id' => 'required|exists:partners,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            // Ensure the directory exists
            $imagePath = public_path('upload/images/donors');
            if (!file_exists($imagePath)) {
            mkdir($imagePath, 0777, true);
            }

            $request->image->move($imagePath, $imageName);

            $data['image'] = $imageName; // Only store the image name in the database
        }

        $donor->update($data);

        return redirect()->route('donors.index')
            ->with('success', 'Donor updated successfully.');
    }

    public function destroy($id)
    {
        $donor = Donor::findOrFail($id);

        // Delete associated image
        if ($donor->image) {
            Storage::disk('public')->delete($donor->image);
        }

        $donor->delete();

        return redirect()->route('donors.index')
            ->with('success', 'Donor deleted successfully.');
    }

    // Custom method for status toggle (not part of resource)
    public function status($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->status = $donor->status == 'on' ? 'off' : 'on';
        $donor->save();

        return redirect()->back()
            ->with('success', 'Donor status updated successfully.');
    }
}
