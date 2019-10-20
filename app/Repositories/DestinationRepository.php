<?php

namespace App\Repositories;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class DestinationRepository
{
    private $model;

    public function __construct(Destination $model)
    {
        $this->model = $model;
    }

    public function store(Request $request, $imageName)
    {
        DB::beginTransaction();

        try {
            $destination = $this->model->create(
                ['name' => $request->name, 'description' => $request->description, 'thumbnail' => $imageName]
            );
            DB::commit();
            return $destination;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function fileUpload($destination, $imageName, $thumbnail)
    {
        DB::beginTransaction();

        try {
            $thumbnail->move(public_path('assets/img/destination'), $imageName);
            $destination->thumbnail = $imageName;
            $destination->save();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function delete(Destination $destination)
    {
        DB::beginTransaction();

        try {
            $destination->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function deleteFile(Destination $destination)
    {
        DB::beginTransaction();

        try {
            File::delete(public_path('assets/img/destination/' . $destination->thumbnail));
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
