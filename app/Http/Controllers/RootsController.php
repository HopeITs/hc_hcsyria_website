<?php

namespace App\Http\Controllers;

use App\Models\RootsOfHope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class RootsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $roots = RootsOfHope::where('online', '1')->get();
        $rootsPending = RootsOfHope::where('online', '0')->get();

        return view('new.admin.roots.index', ['roots' => $roots, 'rootsPending' => $rootsPending]);
    }
    public function create()
    {
        return view('new.admin.roots.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'url'   => 'required|url',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg',
            'file'       => 'nullable|mimes:pdf',
        ]);
        $roots = new RootsOfHope();
        $roots->url = $request->filled('url') ? $request->input('url') : '0';
        if ($file = $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $path = 'files/rootsofhope/';
            $file->move(public_path($path), $fileName);
            $roots->file_path = '/files/rootsofhope/'.$fileName;
        } else $roots->file_path = '0';
        if ($image_file = $request->hasFile('image_file')) {
            $image_file = $request->file('image_file');
            $fileName = $image_file->getClientOriginalName();
            $path = 'images/rootsofhope/';
            $image_file->move(public_path($path), $fileName);
            $roots->image_path = '/'.$path . $fileName;
        } else $roots->image_path = '0';
        $roots->title = $request->input('title');
        $roots->save();
        $this->saveToLog(self::Magazine, $roots->id, 'Magazine Created');
        return redirect()->back()->with('success', 'Magazine ' . $roots->id . ' has been created');
    }
    public function edit($id)
    {
        $roots = RootsOfHope::where('id',$id)->first();
        return view('new.admin.roots.edit', ['roots' => $roots]);
    }
    public function update(Request $request, $id)
    {
        $roots = RootsOfHope::findOrFail($id);

        // Validate only required fields
        $request->validate([
            'title' => 'required|string',
            'url'   => 'required|url',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg',
            'file'       => 'nullable|mimes:pdf',
        ]);

        // Update text fields
        $roots->title = $request->title;
        $roots->url   = $request->url;

        // Handle image upload (only if new file provided)
        if ($request->hasFile('image_file')) {
            $imageName = $request->image_file->getClientOriginalName();
            // Optionally delete old image
            if ($roots->image_path && file_exists(public_path($roots->image_path))) {
                unlink(public_path($roots->image_path));
            }

            $request->image_file->move(public_path('images/rootsofhope'), $imageName);

            $roots->image_path = '/images/rootsofhope/'.$imageName;
        }

        // Handle file upload (only if new file provided)
        if ($request->hasFile('file')) {
            $fileName = $request->file->getClientOriginalName();
            // Optionally delete old file
            if ($roots->file_path && file_exists(public_path($roots->file_path))) {
                unlink(public_path($roots->file_path));
            }

            $request->file->move(public_path('files/rootsofhope'), $fileName);

            $roots->file_path = '/files/rootsofhope/'.$fileName;
        }
        $roots->save();
        return redirect()->back()->with('success', 'Magazine updated successfully!');
    }
    public function destroy($id)
    {
        $roots = RootsOfHope::find($id);
        $roots::destroy($id);
        File::delete(public_path($roots->image_path));
        File::delete(public_path($roots->file_path));
        $this->saveToLog(self::Magazine, $roots->id, 'Magazine deleted');
        return redirect()->back()->with('success', 'Magazine ' . $roots->id . ' deleted successfully');
    }
    public function online(Request $request)
    {
        $roots = RootsOfHope::find($request->input('id'));
        $roots->online = '1';
        $roots->save();
        return redirect()->back()->with('success', 'Magazine ' . $request->input('id') . ' is online');
    }
    public function offline(Request $request)
    {
        $roots = RootsOfHope::find($request->input('id'));
        $roots->online = '0';
        $roots->save();
        return redirect()->back()->with('success', 'Magazine ' . $request->input('id') . ' is offline');
    }
}
