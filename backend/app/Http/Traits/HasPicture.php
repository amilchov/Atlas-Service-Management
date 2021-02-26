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
     * @param string $fieldName
     * @param string $folder
     * @param object $property
     */
    public function checkForPicture(Request $request, string $fieldName, string $folder, object $property): void
    {
        if ($request->hasFile($fieldName))
        {
            $picture = $request->file($fieldName);

            $filename = $property->id . '.' . time() . $picture->getClientOriginalName();

            $property->$fieldName = $picture->storeAs($folder, $filename, 'public');

            $property->save();
        }
    }

    /**
     * Delete picture on the certain property.
     *
     * @param string $model
     * @param object $property
     * @param string $fieldName
     * @return bool
     */
    public function deletePicture(string $model, object $property, string $fieldName): bool
    {
        $picture = str_replace(config('app.url') . Storage::url(''), '', $property->$fieldName);

        if ($picture != $model::DEFAULT_PICTURE)
        {
            return Storage::delete('public/' . $picture);
        }

        return false;
    }
}
