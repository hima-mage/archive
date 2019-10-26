<form action="{{ route($routeName.'.destroy' , ['id' => $row]) }}" class="delete-confirmation" method="post" style="float: right; cursor: pointer">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <a class="btn btn-white btn-link btn-sm" data-original-title="Remove {{ $sModuleName }}">
        <i class="fa fa-times"></i>
    </a>
</form>
