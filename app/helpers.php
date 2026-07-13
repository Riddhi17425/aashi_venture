<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (! function_exists('storeFileWithTimeId')) {
    /**
     * Store an uploaded file on the "public" disk under the given folder,
     * using a collision-safe, time-based file name.
     *
     * @return string Relative path (folder/filename) — save this in the DB.
     */
    function storeFileWithTimeId(UploadedFile $file, string $folder): string
    {
        $folder   = trim($folder, '/');
        $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->storeAs($folder, $filename, 'public');

        return $folder . '/' . $filename;
    }
}

if (! function_exists('storeImageWithTimeId')) {
    // Same behaviour as storeFileWithTimeId, kept as a separate name so
    // call sites read clearly (image vs. generic file upload).
    function storeImageWithTimeId(UploadedFile $file, string $folder): string
    {
        return storeFileWithTimeId($file, $folder);
    }
}

if (! function_exists('deleteStoredFile')) {
    function deleteStoredFile(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
