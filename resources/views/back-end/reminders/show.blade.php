@extends('back-end.layout.app')

@section('title')
    
@endsection

@section('content')

<div class="grids">
    <div class="progressbar-heading grids-heading">
        <h2>{{$pageTitle}}</h2>
    </div>
    <div class="panel panel-widget">

    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                        <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <td>
                                           {{ $row->id }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            تاريخ التذكير
                                        </th>
                                        <td>
                                           {{ $row->date }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                                الرسالة
                                        </th>
                                        <td>
                                           {{ $row->message }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                                عدد مرات التذكير
                                        </th>
                                        <td>
                                            {{ $row->dates->count() }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            التصنيف
                                        </th>
                                        <td>
                                           {{ $row->cat->name }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            التصنيف الفرعي
                                        </th>
                                        <td>
                                           {{ $row->sub_cat->sub_category }}
                                       </td>
                                    </tr>
                                    <tr>
                                        <th>
                                                الحالة
                                        </th>
                                        <td>
                                            <?php
                                                if($row->status==1) {
                                                    echo "فعال";
                                                } elseif($row->status==0) {
                                                    echo "غير فعال";
                                                }
                                            ?>
                                       </td>
                                    </tr>
                                </table>
                                
                                <br><br><center><h2>تواريخ التذكير</h2></center>

                                <table class="table">
                                    </thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th>
                                                التاريخ
                                            </th>
                                            <th>
                                                الإجراء
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attachments as $attachment)
                                        <tr>
                                            <td>
                                               {{ $attachment->id }}
                                            </td>
                                            <td>
                                               {{ $attachment->date }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route($routeName.'.edit' , ['id' => $attachment->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{ $sModuleName }}" style="float: right">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                                                                
                                                <form action="{{ route($routeName.'.destroy' , ['id' => $attachment->id]) }}" class="delete-confirmation" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <a class="btn btn-white btn-link btn-sm" data-original-title="Remove {{ $sModuleName }}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection