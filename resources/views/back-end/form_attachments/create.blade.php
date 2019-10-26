@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{"إضافة " . $sModuleName}}</h2>
    </div>
    <div class="panel panel-widget">
        <form action="{{ route($routeName.'.store') }}" method="POST">
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">إضافة {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
@endsection
