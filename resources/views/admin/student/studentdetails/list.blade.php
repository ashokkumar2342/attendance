@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Student  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.student.show') }}" class="btn btn-info btn-sm" >Back</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>  
                  <th>Name</th>
                  <th>Father's Name</th> 
                  <th>Mother's Name</th> 
                  <th>Mobile</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                   
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->mother_name }}</td>
                  <td>{{ $student->mobile }}</td>
                   
                  <td align="center">
                    
                   {{--  @if (Auth::guard('admin')->user()->id == 1)
                    <a style="margin-left: 3px;" onclick="return confirm('Are you sure to delete Student.')" class="btn btn-danger btn-xs" title="delete student" href="{{ route('admin.student.delete',$student->id) }}"><i class="fa fa-trash"></i></a> 
                    @endif --}}
                    
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     
 </script>
@endpush