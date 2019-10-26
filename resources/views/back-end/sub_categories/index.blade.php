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
            <div class="col-md-4 text-right">
                <a href="{{ route($routeName.'.createSub', ['id'=>$cat->id]) }}" class="btn btn-primary">
                    إضافة {{ $sModuleName }}
                </a>
            </div>
        @endslot
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class=" text-primary">
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        الاسم
                    </th>
                    <th>
                        التصنيف الرئيسي
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
                            {{ $row->name }}
                        </td>
                        <td>
                            {{ $row->cat->name }}
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
                <tfoot>
                    <td>
                        {!! $rows->links() !!}
                    </td>
                  </tr>
                </tfoot>
            </table>
        </div>
    @endcomponent
    </div>
</div>
@endsection
