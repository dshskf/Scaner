@extends('cms.layouts.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Company Profile</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href={{ route('cms-dashboard') }}>Dashboard</a></li>
                <li class="breadcrumb-item active">Company Profile</li>
            </ol>


            <!-- Company Profile -->
            <div class="p-container">
                <h1>Company Profile</h1>
                <form method="post" action={{ route('cms-profile') }} class="p-form" enctype="multipart/form-data">                    
                        {{ csrf_field() }}  
                            <div class="input-box">
                                <label>Address</label>                                
                                <input type="text" name="address" placeholder="Address" value="{{$profile->address}}">
                            </div>

                            <div class="input-box">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Email" value="{{$profile->email}}">
                            </div>

                            <div class="input-box">
                                <label>Phone</label>
                                <input type="text" name="phone" placeholder="Phone" value="{{$profile->phone}}">
                            </div>               

                            <div class="input-box">
                                <label>Map Link</label>
                                <input type="text" name="map" placeholder="Map Link" value="{{$profile->map_link}}">
                            </div>                                   

                        
                            <div class="submit-box">                                
                                <input type="submit" value="Update">
                            </div>
                        </div>
                    
                </form>    
            </div>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

$(document).ready(function(){  
  let form_id

  $("[id*=edit-]").click(function(){    
    const id=this.id.split('-')[1];
    form_id=id
    $(`#p-forms-${id}`).is(':hidden')?
        $(`#p-forms-${id}`).css('display','flex')
        :
        $(`#p-forms-${id}`).hide()    
  })  

  $(".close-modal").click(function(){
    $(`#p-forms-${form_id}`).is(':hidden')?
        $(`#p-forms-${form_id}`).css('display','flex')
        :
        $(`#p-forms-${form_id}`).hide()    
  })
});

</script>

@stop