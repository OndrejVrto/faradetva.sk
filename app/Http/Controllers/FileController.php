<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class FileController extends Controller
{

    public function create( int $id, string $modelType)
    {

		$object = $this->getModel($id, $modelType);

		return view('files.create', compact('object'));

    }

	private function getModel(int $id, string $modelType) : Model
	{

		$model = Str::replace("-", "\\", $modelType);

		return App::make($model)->find($id);

	}

	public function store(Request $request){
		return $request;
	}

	public function update(){
		return 'update';
	}

}
