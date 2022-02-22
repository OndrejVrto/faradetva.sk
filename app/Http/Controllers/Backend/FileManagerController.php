<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class FileManagerController extends Controller
{
    public function __invoke(): View  {
        return view('backend.filemanager.index');
    }
}
