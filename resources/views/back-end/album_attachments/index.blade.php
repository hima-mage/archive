@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{$pageTitle}}</h2>
    </div>
    <div class="panel panel-widget">
    @component('back-end.shared.table')
        @slot('addButton')
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        نوع المرفق
                    </th>
                    <th>
                        المرفق
                    </th>
                    <th>
                        يتبع الألبوم 
                    </th>
                    <th class="text-right">
                        الإجراء
                    </th>
                </tr></thead>
                <tbody>
                
                @foreach($rows as $row)
                    <tr>
                        <td>
                            {{ $row->id }}
                        </td>
                        <td>
                            {{ $row->type }}
                        </td>
                        <td>
                            <a href="/uploads/albums/{{ $row->file }}" >تحميل</a>
                        </td>
                        <td>
                            {{ $row->album->name }}
                        </td>
                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                        </td>
                    </tr>
                @endforeach
                
                    <tr class="gradeX">
                        <td colspan="12">&nbsp;</td>
                    </tr>
                                </tbody>
            </table>
        </div>
    @endcomponent
    </div>
</div>
@endsection
