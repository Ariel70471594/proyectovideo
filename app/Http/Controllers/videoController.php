<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\video;
class videoController extends Controller
{
     public function index(){
     	$lista=video::All();
        return view("videos.index" ,compact('lista'));
    }
    public function cargar(){
     	$es=video::All();
     	return['lista'=>$es,'estado'=>1];
      //  return view("videos.index" ,compact('lista'));
    }
    public function crearvideo(Request $re){
    	
		if($_FILES['video']['name']!=NULL) 
		{ 
		  	$uploadfile_temporal=$_FILES['video']['tmp_name']; 
		  	
		 	 $uploadfile_nombre="F:/programacionWeb2/video/ejemplo/public/peliculas/".$_FILES['video']['name']; 
		  	$ruta_video="F:/programacionWeb2/video/ejemplo/public/peliculas/".$_FILES['video']['name'];
		  	$direcciones='/peliculas/'.$_FILES['video']['name']; 
		  	if (is_uploaded_file($uploadfile_temporal)) 
		 	 { 
		    	copy($uploadfile_temporal,$uploadfile_nombre); 
		    	//
		    	$nueva=new video;
            	$nueva->titulo=$re->input('titulo');
            	$nueva->direccion=$direcciones;
            	$nueva->save();
            	 return ['estado'=>1];
		    	/*$ingresar="insert into video_blog (ruta) values ('$uploadfile_nombre')";  
		    	if(mysql_query($ingresar,$conexion)) 
		    	{ 
		     	 echo "El video ha sido ingresado correctamente";*/
		    } 
		    else 
		    {   
		      echo "Error al ingresar el video"; 
		    } 
		  } 
		   
		  else 
		  { 
		    echo "error al procesar el video"; 
		  } 
		} 
}
