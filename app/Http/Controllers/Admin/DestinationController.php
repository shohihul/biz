<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Destination;

class DestinationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $pageSlug ="destination";

        $destination = Destination::orderBy('id', 'asc')->get();

        return view('admin.destination.index',
            compact(
                'pageSlug',
                'destination',
            ));
    }
    
    public function create()
    {
        $pageSlug ="destination";
        return view('admin.destination.create',
            compact(
                'pageSlug',
            ));
    }

    public function store(Request $request)
    {
        $validate = [
            'name' => 'required',
            'thumbnail' => 'required|image',
            'description' => 'required',
        ];

        $this->validate(request(), $validate);

        $thumbnail = $request->file('thumbnail');
        $imageName = $thumbnail->getClientOriginalName();
        $thumbnail->move(public_path('assets/img/destination'), $imageName);

        $destination = new Destination();
        $destination->name = $request->get('name');
        $destination->description = $request->get('description');
        $destination->thumbnail = $imageName;
        $destination->save();

        \Session::flash('status', 'Berhasil Menambahkan Destinasi');
        return redirect(route('admin.destination'));

    }

    public function destroy($id)
    {
        $destination = Destination::where('id', $id)->first();

        $destination->delete();

        \Session::flash('status', 'Berhasil Menghapus Data');
        return redirect(route('admin.destination'));
    }

    public function edit($id)
    {
        $pageSlug ="destination";
        $destination = Destination::where('id', $id)->first();

        return view('admin.destination.edit',
            compact(
                'destination',
                'pageSlug',
            ));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::where('id', $id)->first();

        $validate = [
            'name' => 'required',
            'thumbnail' => 'image',
            'description' => 'required',
        ];

        $this->validate(request(), $validate);
        if (!empty($request->file('thumbnail'))) {

            $thumbnail = $request->file('thumbnail');
            $imageName = $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('assets/img/destination'), $imageName);

            $destination->name = $request->get('name');
            $destination->description = $request->get('description');
            $destination->thumbnail = $imageName;
            $destination->save();
        }
        else {
            
            $destination->name = $request->get('name');
            $destination->description = $request->get('description');
            $destination->save();
        }

        \Session::flash('status', 'Berhasil Update Data');
        return redirect(route('admin.destination'));

    }
}
