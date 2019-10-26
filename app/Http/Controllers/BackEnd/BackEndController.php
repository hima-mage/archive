<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackEndController extends Controller
{

    protected $model;

    protected $moduleName;

    protected $pageTitle;

    protected $pageDes;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(!empty($with)){
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);
        $moduleName = $this->pluralModelName();
        $sModuleName = $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $pageTitle = $moduleName;
        $append = $this->append();

        return view('back-end.' . $this->getClassNameFromModel() . '.index', compact(
            'rows',
            'routeName'
        ))->with($append);
    }

    public function create()
    {
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();
        return view('back-end.' . $folderName . '.create' , compact(
            'folderName',
            'routeName',
        ))->with($append);
    }

    public function destroy($id)
    {
        $item = $this->model->FindOrFail($id);
        $this->model->FindOrFail($id)->delete();
        if($this->getModelName()=='Department'){
            return redirect()->route($this->getClassNameFromModel() . '.admin', ['id' => $item->admin_id]);
        } elseif($this->getModelName()=='Sub_category') {
            return redirect()->route($this->getClassNameFromModel() . '.cat', ['id' => $item->cat_id]);
        } elseif($this->getModelName()=='Export_attachment') {
            //return redirect()->route('exports.show', ['id' => $item->export_id]);
            return redirect()->route('exports.edit', ['id' => $item->export_id]);
        } elseif($this->getModelName()=='Export_reminder') {
            //return redirect()->route('exports.show', ['id' => $item->export_id]);
            return redirect()->route('exports.edit', ['id' => $item->export_id]);
        } elseif($this->getModelName()=='Import_attachment') {
            return redirect()->route('imports.show', ['id' => $item->import_id]);
        } elseif($this->getModelName()=='Import_reminder') {
            return redirect()->route('imports.show', ['id' => $item->import_id]);
        } else {
            return redirect()->route($this->getClassNameFromModel() . '.index');
        }

    }

    public function edit($id)
    {
        $row = $this->model->FindOrFail($id);
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();
        $parent = $row;
        return view('back-end.' . $folderName . '.edit', compact(
            'row',
            'folderName',
            'routeName',
            'parent',
        ))->with($append);
    }

    protected function filter($rows)
    {
        return $rows;
    }

    protected function with(){
        return [];
    }

    protected function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName(){
        return str_plural($this->getModelName());
    }

    protected function getModelName(){
        return class_basename($this->model);
    }

    protected function append(){
        return [];
    }

}