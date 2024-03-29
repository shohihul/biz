<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DestinationStoreRequest;
use App\Http\Requests\DestinationUpdateRequest;
use App\Repositories\DestinationRepository;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Destination;
use File;

class DestinationController extends Controller
{
    private $destinationRepository;

    public function __construct(DestinationRepository $destinationRepository)
    {
        $this->middleware('auth:admin');

        $this->destinationRepository = $destinationRepository;
    }
    public function index()
    {
        $pageSlug ="destination";

        $destination = Destination::orderBy('id', 'asc')->get();

        return view('Admin.Destination.index',
            compact(
                'pageSlug',
                'destination'
            ));
    }
    
    public function create()
    {
        $pageSlug ="destination";
        return view('Admin.Destination.create',
            compact(
                'pageSlug'
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
        $destination = $this->destinationRepository->get($id);

        return view('Admin.Destination.edit',
            compact(
                'destination',
                'pageSlug'
            ));
    }

    public function update(DestinationUpdateRequest $request, Destination $destination)
    {
        if (!empty($request->file('thumbnail'))) {

            $thumbnail = $request->file('thumbnail');
            $imageName = $thumbnail->getClientOriginalName();

            $this->destinationRepository->deleteFile($destination);
            $this->destinationRepository->update($request, $destination, $imageName);
            $this->destinationRepository->fileUpload($destination, $imageName, $thumbnail);

            \Session::flash('status', 'Berhasil Update Data & Thumbnail');
        }
        else {
            
            $destination->name = $request->get('name');
            $destination->description = $request->get('description');
            $destination->save();

            \Session::flash('status', 'Berhasil Update Data');
        }
        
        return redirect(route('admin.destination'));
    }
}
