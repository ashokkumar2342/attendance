<?php

namespace App\Helper;

 
use Auth;

class MyFuncs {

    public static function full_name($first_name,$last_name) {
        // return $first_name . ', '. $last_name;   
        return $first_name . ', '. $last_name;   
    } 
    ///
    public static function menus(){ 	 

    	$urls=[ 
     		 
     		 
     		 
            '3'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-user text-warning"></i>
                    <span>Student</span>
                    <span class="pull-right-container">
                      
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'.route('admin.student.form').'"><i class="fa fa-circle-o"></i> Add</a></li>
                      
                    <li><a href="'.route('admin.student.show').'"><i class="fa fa-circle-o"></i> Show</a></li>
                    <li><a href="'.route('admin.student.excel.import').'"><i class="fa fa-circle-o"></i> Excel Import</a></li>
                </ul>
            </li>',
           
          
            '6'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs text-danger"></i>
                    <span>Manage</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>            
                <ul class="treeview-menu">
                    
                    <li><a href="'. route('admin.class.list').'"><i class="fa fa-circle-o"></i> Add Class</a></li>
                     
                     
                      
                </ul>
            </li>   ',
            
              '9'=>' <li class="treeview">
                <a href="#">
                    <i class="fa fa-clock-o text-success"></i>
                    <span>Attendance</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="'. route('admin.attendance.student.form').'"><i class="fa fa-circle-o"></i> Student </a></li>  
                </ul>
            </li>',
     		 
    		];

    		 
    	 

    	foreach ($urls as $key => $value) {
    	
        	 echo $value;
    	 
    		  
    	}
    	
    }
}