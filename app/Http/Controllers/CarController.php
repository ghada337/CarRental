<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;

    public function index()
    {
        $cars = Car::with('category')->get();
        return view('admin.cars.cars', compact('cars'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.cars.addCar', compact('categories'));
    }

    public function store(StoreCarRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {

                $path = $request->file('image')->store('cars', 'public');
                $data['image'] = $path;
            }
            $data['active'] = $request->has('active');
            Car::create($data);
            return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add car due to an error: ' . $e->getMessage());
        }
    }


    public function update(UpdateCarRequest $request, $id)
{
    try {
        $car = Car::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $path = $request->file('image')->store('cars', 'public');
            $data['image'] = $path;
        }
        $data['active'] = $request->has('active');
        $car->update($data);
        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update car due to an error: ' . $e->getMessage());
    }
}




    public function edit(Car $car)
    {
        $categories = Category::all();
        return view('admin.cars.editCar', compact('car', 'categories'));
    }




    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }

    public function toggleActive(Car $car)
    {
        $car->active = !$car->active;
        $car->save();
        return back()->with('success', 'Car status updated successfully.');
    }
}


