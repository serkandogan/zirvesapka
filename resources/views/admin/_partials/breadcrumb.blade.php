<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ url('/') }}">Ana Sayfa</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            {{ $category or '/' }}
            <i class="fa fa-angle-right"></i>
        </li>
        @if(isset($page))
            <li>
                {{ $page }}
            </li>
        @endif
    </ul>
</div>
<!-- END PAGE HEADER-->