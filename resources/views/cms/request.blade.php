@extends('cms.layouts.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Request</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href={{ route('cms-dashboard') }}>Dashboard</a></li>
                <li class="breadcrumb-item active">Request</li>
            </ol>


            <!-- Content Index -->
            <div class="c-i-container">
                <h1>Request</h1>
                <div class="c-i-section">
                    @foreach ($request as $key=>$r)
                        <div class="c-i-list">
                            <div class="c-i-item a-i-item">
                                <p>{{$key+1}}</p>
                                <p>{{$r->email}}</p>                                                                      
                                <label id="edit-{{$key+1}}">show</label>                        
                            </div>

                            <form id="c-i-forms-{{$key+1}}" method="post" action={{ route('cms-features') }} class="c-i-form a-i-form" style="height:20rem !important;" enctype="multipart/form-data">                            
                                {{ csrf_field() }}        
                                <input name="_method" type="hidden" value="PUT">       
                                <div class="request-message">
                                    <h1>{{$r->subject}}</h1>
                                    <div class="request-message-msg">
                                        <p>{{$r->message}}</p>
                                    </div>
                                </div>                                                   
                            </form>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function(){  
  
  $("[id*=edit-]").click(function(){    
    const id=this.id.split('-')[1];
    $(`#c-i-forms-${id}`).is(':hidden')?
        $(`#c-i-forms-${id}`).css('display','flex')
        :
        $(`#c-i-forms-${id}`).hide()    
  })  

  $('#c-add').click(function(){
    $(`#c-i-add-forms`).is(':hidden')?
        $(`#c-i-add-forms`).css('display','flex')
        :
        $(`#c-i-add-forms`).hide()    
  })
});

</script>

@stop