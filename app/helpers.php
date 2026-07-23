<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

if (! function_exists('storeFileWithTimeId')) {
    /**
     * Store an uploaded file directly under public/backend/{folder}
     * using a collision-safe, time-based file name.
     *
     * @return string Relative path (folder/filename) — save this in the DB.
     */
    function storeFileWithTimeId(UploadedFile $file, string $folder): string
    {
        $folder      = trim($folder, '/');
        $destination = public_path('backend/' . $folder);

        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $filename);

        return $folder . '/' . $filename;
    }
}

if (! function_exists('storeImageWithTimeId')) {
    function storeImageWithTimeId(UploadedFile $file, string $folder): string
    {
        return storeFileWithTimeId($file, $folder);
    }
}

if (! function_exists('deleteStoredFile')) {
    function deleteStoredFile(?string $path): void
    {
        if (! $path) {
            return;
        }

        $fullPath = public_path('backend/' . $path);

        if (is_file($fullPath)) {
            @unlink($fullPath);
        }
    }
}
