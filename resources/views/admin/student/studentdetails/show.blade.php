@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Student  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.student.form') }}" class="btn btn-info btn-sm" >Add Student</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>id</th>
                   
                  <th>Class</th>
                 
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th>Mother Name</th> 
                  <th>Mobile</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                  <td>{{ $student->id }}</td>
                  
                  <td>{{ $student->classes->alias or '' }}</td>
                  
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->father_name }}</td>
                  <td>{{ $student->mother_name }}</td>
                  <td>{{ $student->mobile }}</td>
                   
                  <td align="center">
                    
                    
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