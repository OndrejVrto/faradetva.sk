<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class FileManagerController extends Controller
{
    public function __invoke() {
        return view('backend.filemanager.index');
    }
}
