<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    //Show single listing
    public function workspace()
    {
        return view('listings.workspace', [
            
        ]);
    }
}
