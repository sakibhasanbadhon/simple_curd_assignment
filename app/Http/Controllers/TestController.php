<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class TestController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|unique:test_models,email',
            'gender' => 'required|in:Male,Female',
            'image'  => 'required|image|mimes:jpg,jpeg,png',
            'skill'  => 'required|array'
        ]);

        // image upload
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = uniqid(rand().time()).'.'.$extension;
            $file->move('uploads/',$imageName);
        }

        // store
        TestModel::create([
            'name'   => $request->name,
            'email'  => $request->email,
            'gender' => $request->gender,
            'skills' => json_encode($request->skill),
            'image'  => $imageName
        ]);

        return back()->with('success','Assignment data created successful.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = TestModel::findOrFail($id);
        $allData = TestModel::toBase()->orderBy('id','DESC')->simplePaginate(10);
        return view('assignment',['edit'=>$edit,'allData'=>$allData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|unique:test_models,email,'.$id,
            'gender' => 'required|in:Male,Female',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png',
            'skill'  => 'required|array'
        ]);

        $update = TestModel::findOrFail($id);
        // image upload
        if ($request->has('image')) {
            file_exists('uploads/'.$update->image) ? unlink('update/'.$update->image) : false;
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = uniqid(rand().time()).'.'.$extension;
            $file->move('uploads/',$imageName);
        }else{
            $imageName = $update->image;
        }

        // update
        $update->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'gender' => $request->gender,
            'skills' => json_encode($request->skill),
            'image'  => $imageName
        ]);

        return back()->with('success','Assignment data updated successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = TestModel::findOrFail($id);
        unlink('uploads/'.$delete->image);
        $delete->delete();
        return back()->with('success','Assignment data deleted successful.');
    }
}
