<?php

namespace App\Http\Controllers\Download\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index_320(File $file)
    {
        Storage::download($file->file_320);
    }
}
