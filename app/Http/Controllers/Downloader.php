<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Downloader extends Controller
{

    public function downloader($id)
    {
        $workspace = Workspace::where('id', $id)->firstOrFail();
        $file_path = $workspace->link;

        // return Storage::download($file_path);
        if (Storage::disk('public')->exists($file_path)) {
            return Storage::disk('public')->download($file_path);
        } else {
            abort(404, 'File not found');
        }
    }
}
