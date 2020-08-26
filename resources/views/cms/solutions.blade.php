@extends('cms.layouts.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Solutions</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href={{ route('cms-dashboard') }}>Dashboard</a></li>
                <li class="breadcrumb-item active">Solutions</li>
            </ol>


            <!-- Content Index -->
            <div class="c-i-container">
                <h1>Solutions</h1>
                <div class="c-i-section">
                    @foreach ($solution as $key=>$s)
                        <div class="c-i-list">
                            <div class="c-i-item">
                                <p>{{$key+1}}</p>
                                <p>{{$s->category}}</p>      
                                <p>{{substr($s->description,0,30)}}...</p>                                 
                                <label id="edit-{{$key+1}}">Edit</label>                        
                            </div>

                            <form id="c-i-forms-{{$key+1}}" method="post" action={{ route('cms-solutions') }} class="c-i-form" enctype="multipart/form-data">                            
                                {{ csrf_field() }}        
                                <input name="_method" type="hidden" value="PUT">                                 
                                <input type="hidden" name="id" value={{$s->id}}>                                
                                <input type="text" name="category" placeholder="Category" value="{{$s->category}}">
                                <input type="text" name="description" placeholder="Description" value="{{$s->description}}">
                                <input type="text" name="icon" placeholder="Icon" value="{{$s->icon}}">
                                <input type="submit" name="action" value="Update">     
                                <input type="submit" name="action" class="c-i-form-delete" value="Delete">                                                           
                            </form>
                        </div>
                    @endforeach
                    <div class="c-i-list">
                        <div id="c-add" class="c-list" >
                            <p>+ Add Solution</p>
                        </div>

                        <form id="c-i-add-forms" method="post" action={{ route('cms-solutions') }} class="c-i-form client-i-form" enctype="multipart/form-data">
                            {{ csrf_field() }}                                                                                                    
                            <input type="text" name="category" placeholder="Category" >
                            <input type="text" name="description" placeholder="Description">
                            <input type="text" name="icon" placeholder="Icon">
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