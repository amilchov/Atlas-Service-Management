<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
|--------------------------------------------------------------------------
| Has Picture
|--------------------------------------------------------------------------
|
| This class is a type of trait, in which we manipulate
| different things with pictures.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
trait HasPicture
{
    /**
     * Check if in the request is set picture.
     *
     * @param Request $request
     * @param string $property
     * @param string $folder
     * @param object $object
     */
    public function checkForPicture(Request $request, string $property, string $folder, object $object): void
    {
        if ($request->hasFile($property))
        {
            $picture = $request->file($property);

            $filename = $object->id . '.' . time() . $picture->getClientOriginalName();

            $object->$property = $picture->storeAs($folder, $filename, 'public');

            $object->save();
        }
    }

    /**
     * Delete picture on the certain property.
     *
     * @param string $class
     * @param object $object
     * @param string $property
     * @return bool
     */
    public function deletePicture(string $class, object $object, string $property): bool
    {
        $picture = str_replace(config('app.url') . Storage::url(''), '', $object->$property);

        if ($picture !== $class::DEFAULT_PICTURE)
        {
            return Storage::delete('public/' . $picture);
        }

        return false;
    }
}
