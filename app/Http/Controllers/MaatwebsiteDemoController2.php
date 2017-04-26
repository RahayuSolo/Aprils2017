<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use Excel;

use File;

class MaatwebsiteDemoController extends Controller
{

	/**
     * Return View file
     *
     * @var array
     */
	public function importExport()
	{
		return view('articles/importExport');
	}

	/**
     * File Export Code
     *
     * @var array
     */
	public function downloadExcel(Request $request, $id)
		{
			$import;
			$data=Article::with(array('comments'=>function($query){
				$query->where('article_id','$id');
				$query->select('article_id','content');
				$query->orderBy('comments.created_at','DESC');
			}))->where('id','$id')->get();
			
			return Excel::create('Learned Laravel ImportExport', function($excel) use ($data) {
				$excel->sheet('mySheet', function($sheet) use ($data)
				{
					$sheet->fromArray($data);
				});
			})->download($type);
		}
		

	/**
     * Import file into database Code
     *
     * @var array
     */
	public function importExcel(Request $request)
	{
		if($request->hasFile('import_file')){

			$path = $request->file('import_file')->getRealPath();

			$extension = $request->file('import_file')->getClientOriginalExtension();

			$data = Excel::load($path, function($reader) {})->get();


			if(!empty($data) && $data->count()){


				foreach ($data->toArray() as $key => $value) {

					if ($extension == 'ods') {
						
						if(!empty($value)){

							foreach ($value as $v) {		

								$insert[] = ['title' => $v['title'], 'content' => $v['content'], ];
							}
						}

					}else{

						$insert[] = ['title' => $value['title'], 'content' => $value['content']];

					}
				}
				if(!empty($insert)){

					Article::insert($insert);

					return back()->with('success','Insert Record successfully.');
				}
			}
		}

		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}