@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Add <small>Details</small> </h1>
      <ol class="breadcrumb">
       {{-- <li><a href="#" class="btn btn-warning"> Download Sample </a></li>         --}}
      </ol>
</section>
    <section class="content">        
      
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{ Form::open(['route'=>'admin.student.post']) }}                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',$classes, $default->class_id, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                             </div> {{--row end --}}
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('student_name','Student Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('student_name','',['class'=>'form-control',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                                </div>
                                            </div>  
                                           
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('father_name','Father Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('father_name','',['class'=>'form-control',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('father_name') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('mother_name','Mother Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mother_name','',['class'=>'form-control ',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('mother_name') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('mobile','Mobile Number',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mobile','',['class'=>'form-control ',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('mobile') }}</p>
                                                     
                                                </div>
                                            </div>
                                              
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}   
                            
                                         
                             
                        
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                            
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    $("#class").change(function(){
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search') }}",
          data: { id: $(this).val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }            
        });
    });

    $("#class").change(function(){
        sectionSearch($(this).val());
    });     
    
    if ($("#class").val() > 0) {
        sectionSearch($("#class").val(),{{ $default->section_id }}); 
    }
    
     
    function sectionSearch (value,selectVal=null){
        var selected = null;
        $('#section').html('<option value="">Searching ...</option>'); 
      
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search2') }}",
          data: { id: value }
        })
        .done(function(response ) {            
             if(response.section.length>0){
                $('#section').html('<option value="">Select section</option>');
               for (var i = 0; i < response.section.length; i++) {
                    if(selectVal>0){
                        selected = (selectVal==response.section[i].id)?'selected':''; 
                    }
                    $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>'); 
                }
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            } 
                   
        });
    }
    
</script>

@endpush