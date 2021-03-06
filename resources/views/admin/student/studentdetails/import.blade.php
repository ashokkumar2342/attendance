@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Add <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><a href="{{ asset('sample/sample.csv') }}"><i class="fa fa-download"></i> Download Sample</a></li>        
      </ol>
</section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{-- {{ Form::open(['route'=>'admin.student.excel.store']) 'method'=>'POST','files'=>'true' }} --}}
                        {!! Form::open(array('route' => 'admin.student.excel.store','method'=>'POST','files'=>'true')) !!}                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',$classes, '', ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('excel_file','Excel File',['class'=>' control-label']) }}
                                                    {!! Form::file('excel_file', '', ['class'=>'form-control','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('excel_file') }}</p>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                                {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
                                                                <div class="col-md-9">
                                                                {!! Form::file('sample_file', array('class' => 'form-control')) !!}
                                                                {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}
                                                                </div>
                                                            </div> --}}
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
     
    
</script>

@endpush