<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;

    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.testimonials', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.addTestimonial');
    }

    public function store(StoreTestimonialRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {

                $path = $request->file('image')->store('testimonials', 'public');
                $data['image'] = $path;
            }
            $data['active'] = $request->has('active');
            Testimonial::create($data);
            return redirect()->route('admin.testimonials.index')->with('success', 'Car added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add car due to an error: ' . $e->getMessage());
        }
    }


    public function update(UpdateTestimonialRequest $request, $id)
{
    try {
        $testimonial = Testimonial::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $path = $request->file('image')->store('testimonials', 'public');
            $data['image'] = $path;
        }
        $data['active'] = $request->has('active');
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Car updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update car due to an error: ' . $e->getMessage());
    }
}


    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.editTestimonial', compact('testimonial'));
    }
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }

    public function toggleActive(Testimonial $testimonial)
    {
        $testimonial->published = !$testimonial->published;
        $testimonial->save();
        return back()->with('success', 'Testimonial status updated successfully.');
    }
}
