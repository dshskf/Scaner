@extends('cms.layouts.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Features</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href={{ route('cms-dashboard') }}>Dashboard</a></li>
                <li class="breadcrumb-item active">Features</li>
            </ol>


            <!-- Content Index -->
            <div class="c-i-container">
                <h1>Features</h1>
                <div class="c-i-section">
                    @foreach ($features as $key=>$f)
                        <div class="c-i-list">
                            <div class="c-i-item a-i-item">
                                <p>{{$key+1}}</p>
                                <p>{{$f->title}}</p>                                                                      
                                <label id="edit-{{$key+1}}">Edit</label>                        
                            </div>

                            <form id="c-i-forms-{{$key+1}}" method="post" action={{ route('cms-features') }} class="c-i-form a-i-form" style="height:30rem !important;" enctype="multipart/form-data">                            
                                {{ csrf_field() }}        
                                <input name="_method" type="hidden" value="PUT">                                 
                                <input type="hidden" name="id" value={{$f->id}}>                                
                                <input type="hidden" name="last_icon" value={{$f->icon}}>                                
                                <input type="text" name="title" placeholder="Title" value="{{$f->title}}">
                                <input type="file" name="image">
                                <textarea form="c-i-forms-{{$key+1}}" name="description" placeholder="Description">{{$f->description}}</textarea>                                
                                <input type="submit" name="action" value="Update">     
                                <input type="submit" name="action" class="c-i-form-delete" value="Delete">                                                           
                            </form>
                        </div>
                    @endforeach
                    <div class="c-i-list">
                        <div id="c-add" class="c-list" >
                            <p>+ Add Features</p>
                        </div>

                        <form id="c-i-add-forms" method="post" action={{ route('cms-features') }} class="c-i-form client-i-form" enctype="multipart/form-data">
                            {{ csrf_field() }}                                                                                                                                
                            <input type="text" name="title" placeholder="Title">
                            <input type="text" name="description" placeholder="Description">
                            <input type="file" name="image">
                            <input type="submit" name="action" value="Add">
                        </form>
                    </div>
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