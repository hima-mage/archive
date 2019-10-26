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
                <a href="{{ route($routeName.'.create') }}" class="btn btn-primary">
                    إضافة {{ $sModuleName }}
                </a>
            </div>
        @endslot
        <div class="table-responsive">

                <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm m-b-xs" onkeyup="serchSub($('#filter').val());" onkeypress="if(event.which == 13) { $('#serchIcon').trigger('click'); } " id="filter" placeholder="Search">
                            <span class="input-group-addon" id="serchIcon" onclick="serchSub($('#filter').val());" style="cursor: pointer">
                                <i class="glyphicon glyphicon-search"></i>
                            </span>
                        </div>
                    </div>

            <table class="table table-striped">
                <thead class="text-primary">
                <tr>
                    <th>
                        رقم النموذج
                    </th>
                    <th>
                        اسم النموذج
                    </th>
                    <th>
                        تاريخ الفعالية
                    </th>
                    <!--th>
                    <th>
                        التصنيف
                    </th>
                    <th>
                        التصنيف الفرعي
                    </th>
                    <th>
                        الإدارة
                    </th>
                    <th>
                        القسم
                    </th-->
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
                            {{ $row->date }}
                        </td>
                        <!--td>
                            {{ $row->cat->name }}
                        </td>
                        <td>
                            {{ $row->sub_cat->name }}
                        </td>
                        <td>
                            {{ $row->admin->name }}
                        </td>
                        <td>
                            {{ $row->dept->name }}
                        </td-->
                        <td class="td-actions text-right">
                            <a href="{{ route($routeName.'.show', ['id' => $row->id]) }}" class="btn btn-white btn-link btn-sm" style="float: right">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
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

    <script>
        function serchSub(text) {
          if(text!="" || text!=" ") {
        $(".table tbody").html('<tr class="gradeX"><td colspan="12">...Loading</td></tr>');
            $.ajax({
                url: "{{ route('videos.search') }}",
                type: "post", //send it through get method
                data: {
                    'text': text,
                },
                success: function (response) {
                    //console.log(response);
                    $(".table tbody").html(response)
                    $(".table tfoot").html("")
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
          }
        }
    </script>      

@endsection
