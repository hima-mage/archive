@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{"تعديل " . $moduleName}}</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route($routeName.'.update' , ['id' => $row]) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('put') }}
            @include('back-end.'.$folderName.'.form')
            <button id="submit" type="submit" class="btn btn-primary pull-right">تحديث {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
@endsection
