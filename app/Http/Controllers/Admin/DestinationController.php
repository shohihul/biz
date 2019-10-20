<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DestinationStoreRequest;
use App\Repositories\DestinationRepository;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Destination;
use File;

class DestinationController extends Controller
{
    public function __construct(DestinationRepository $destinationRepository)
    {
        $this->middleware('auth:admin');

        $this->destinationRepository = $destinationRepository;
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

    public function store(DestinationStoreRequest $request)
    {
        
        $thumbnail = $request->file('thumbnail');
        $imageName = $thumbnail->getClientOriginalName();

        $destination = $this->destinationRepository->store($request, $imageName);
        $this->destinationRepository->fileUpload($destination, $imageName, $thumbnail);

        \Session::flash('status', 'Berhasil Menambahkan Destinasi');
        return redirect(route('admin.destination'));

    }

    public function delete(Destination $destination)
    {

        $file = public_path('assets/img/destination/' . $destination->thumbnail);

        if(File::exists($file)){

            $this->destinationRepository->delete($destination);
            $this->destinationRepository->deleteFile($destination);

            \Session::flash('status', 'Berhasil Menghapus Data');
            return redirect(route('admin.destination'));
        }
        else {
            \Session::flash('danger', 'File Thumbnail Tidak Ditemukan');
            return redirect(route('admin.destination'));
        }
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

        $file = public_path('assets/img/destination/' . $destination->thumbnail);

        $validate = [
            'name' => 'required',
            'thumbnail' => 'image',
            'description' => 'required',
        ];

        $this->validate(request(), $validate);
        if (!empty($request->file('thumbnail'))) {

            if(File::exists($file)){
                File::delete($file);
                $destination->delete();
            }

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
