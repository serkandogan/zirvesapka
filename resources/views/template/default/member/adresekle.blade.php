@extends("template.".$siteTheme.".layout.master")
@section("content")

<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content">
{!! Form::open(['action'=>'Site\MemberAccountController@postAdresekle', 'method'=>'POST']) !!}
@include(theme('member.adress-form'))
{!! Form::close() !!}
</div>
</div>
</div>
@endsection

@section('css')
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}"/>
@endsection

@section('js')
        <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>


        <script type="text/javascript">
        $(document).ready(function() {
          $(".select2form").select2(); 


            $('select[name=AdresIlID]').on('change',function(){
            var id = $(this).val();
            if (id != ''){
                $('select[name=AdresIlceID]').empty();
                $('select[name=AdresIlceID]').select2("enable", false);
                $.get("{{url('sepet/town')}}",{id:id,_token:"{!! csrf_token() !!}"},function(response){
                     
                    console.log("aaaa:"+response);
                    $('select[name=AdresIlceID]').empty();
                    $.each(response.ilceler,function(i, item){ 
                       $("select[name=AdresIlceID]").append('<option value="'+i+'">'+item+'</option>');
                    });
                    $('select[name=AdresIlceID]').select2("enable", true); 
                 
                },'json');
            }
            }); 
            $('select[name=FaturaIlID]').on('change',function(){
            var id = $(this).val();
            if (id != ''){
                $('select[name=FaturaIlceID]').empty();
                $('select[name=FaturaIlceID]').select2("enable", false);
                $.get("{{url('sepet/town')}}",{id:id,_token:"{!! csrf_token() !!}"},function(response){
                     
                    console.log("aaaa:"+response);
                    $('select[name=FaturaIlceID]').empty();
                    $.each(response.ilceler,function(i, item){ 
                       $("select[name=FaturaIlceID]").append('<option value="'+i+'">'+item+'</option>');
                    });
                    $('select[name=FaturaIlceID]').select2("enable", true); 
                 
                },'json');
            }
            }); 

        });
        </script>

                  
@endsection