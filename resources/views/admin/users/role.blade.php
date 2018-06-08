@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Kullanıcı', 'page' => 'Rollerini Düzenle'])
 
            <p></p>
            <p></p>
        <div class="portlet box blue">
        <div class="portlet-title">
        <div class="caption">
        <i class="fa fa-gift"></i>Kullanıcı Rollerini Tanımla
        </div> 
        </div>
        <div class="portlet-body">  
            <div class="profile-content">
            {!! Form::open(['action'=>['Admin\UsersController@postRoleupdate', $record->id], 'files'=>true, 'method'=>'POST']) !!}
                <table class="table">
                <thead>
                    <tr>
                        <th>Modül</th>
                        <th colspan="5">Yetkilendirmeler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($moduleList as $key => $item)
                    <tr>
                     <td>{!! $item !!}</td>
                     <td>  

                     <input {!! App\Models\UserRole::check($key, 'list', $record->id) !!} type="checkbox" name="perm[{!! $key !!}][]" value="list" class="CLASS{!! $key !!}" id="view{!! $key !!}"> 
                        <label for="view{!! $key !!}">Görüntüleme</label>
                     </td>
                     <td><input {!! App\Models\UserRole::check($key, 'add', $record->id) !!} type="checkbox" name="perm[{!! $key !!}][]" value="add" class="CLASS{!! $key !!}" id="add{!! $key !!}"> <label for="add{!! $key !!}">Ekleme</label></td>
                     <td><input {!! App\Models\UserRole::check($key, 'edit', $record->id) !!} type="checkbox" name="perm[{!! $key !!}][]" value="edit" class="CLASS{!! $key !!}" id="edit{!! $key !!}"> <label for="edit{!! $key !!}">Düzenleme</label></td>
                     <td><input {!! App\Models\UserRole::check($key, 'delete', $record->id) !!} type="checkbox" name="perm[{!! $key !!}][]" value="delete" class="CLASS{!! $key !!}" id="delete{!! $key !!}"> <label for="delete{!! $key !!}">Silme</label></td>
                     <td><input type="checkbox" class="selectAll" data-key="{!! $key !!}" id="selectAll{!! $key !!}"> <label for="selectAll{!! $key !!}">Tam Yetki</label></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <button type="submit" class="btn btn-default">Yetkileri Düzenle</button>
            {!! Form::close() !!}
            </div> 
        </div>
        </div> 
@endsection


@section('js')   
    <script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
           // ComponentsFormTools.init();

            jQuery(".selectAll").change(function(){
                var data = jQuery(this).data('key');
                jQuery(".CLASS"+data).prop('checked', jQuery(this).prop("checked"));
            });
        });   
</script>
@endsection