@extends('cms.layouts.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Home</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href={{ route('cms-dashboard') }}>Dashboard</a></li>
                <li class="breadcrumb-item active">Home</li>
            </ol>


            <!-- Home -->
            <div class="p-container">
                <h1>Home</h1>
                <form method="post" action={{ route('cms-home') }} class="p-form" enctype="multipart/form-data">                    
                        {{ csrf_field() }}  
                            <div class="input-box">
                                <label>Title</label>                                
                                <input type="text" name="title" value="{{$home->title}}">
                            </div>

                            <div class="input-box">
                                <label>Description</label>
                                <input type="text" name="description" value="{{$home->description}}">
                            </div>

                            <div class="input-box">
                                <label>Button</label>
                                <input type="text" name="button" value="{{$home->button}}">
                            </div>               

                            <div class="input-box">
                                <label>Image</label>
                                <input type="file" name="image" value="{{$home->image}}">
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