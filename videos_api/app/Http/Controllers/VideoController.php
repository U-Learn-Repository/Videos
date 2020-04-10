<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;


class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
     $videos = Video::all();

     return response()->json($videos);

    }

     public function create(Request $request)
     {
         /*
         $validate = $this->validate($request, [
             'adjunto' => 'required|mimes:jpg,jpeg,png'
         ]); */
         /*        
         $video = new Video;

         $video->id_curso= $request->id_curso;
         $video->id_tema= $request->id_tema;
         $video->id_capitulo= $request->id_capitulo;       
         $video->archivo = '../video/video' .$request->input('id_curso') .'_' .$request->input('id_tema') .'_' .$request->input('id_capitulo');
       
         $video->save();

         //$product = Product::create($request->all());

         return response()->json($video); 
          * 
          */
         /*
         $filename = "user_image.jpg";
         $path = $request->file('adjunto')->move("/", $filename);
         $archivoURL = url('/' .$filename);
         
         return response()->json(['url' => $archivoURL], 200);
         */
         
         $video = new Video;
         
         $video->id_curso= $request->id_curso;
         $video->id_tema= $request->id_tema;
         $video->id_capitulo= $request->id_capitulo;
         $video->archivo = '../videos/video_' .$request->input('id_curso') .'_' .$request->input('id_tema') .'_' .$request->input('id_capitulo');
         $video->descripcion= $request->descripcion;
         $video->calificacion= 0;
         
         if(!function_exists('public_path'))
            {

                /**
                * Return the path to public dir
                * @param null $path
                * @return string
                */
                function public_path($path=null)
                {
                        return rtrim(app()->basePath('public/'.$path), '/');
                }
            }

         $this->validate($request, [

            'adjunto' => 'required|file|mimes:mp4|max:204800',

         ]);

         $filename = $video->archivo .'.mp4';
         $adjunto = $request->file('adjunto')->move(public_path('videos'), $filename);
         $video->archivo = $filename;
         $video->save();

         return response()->json($video);
     }

         public function show($id)
     {
        $video = Video::find($id);

        return response()->json($video);
     }

     public function update(Request $request, $id)
     { 
         var_dump($request->descripcion);
        $video= Video::find($id);
        $video->descripcion = $request->input('descripcion');
        $video->archivo = '../videos/video_' .$video->id_curso .'_' .$video->id_tema .'_' .$video->id_capitulo;
        if(!function_exists('public_path'))
            {

                /**
                * Return the path to public dir
                * @param null $path
                * @return string
                */
                function public_path($path=null)
                {
                        return rtrim(app()->basePath('public/'.$path), '/');
                }
            }

         $this->validate($request, [

            'adjunto' => 'required|file|mimes:mp4|max:204800',

         ]);

         $filename = $video->archivo .'.mp4';
         $adjunto = $request->file('adjunto')->move(public_path('videos'), $filename);
         $video->archivo = $filename;
        $video->save();
        return response()->json($video); 
     }

     public function delete($id)
     {
        $video = Video::find($id);
        $video->delete();

         return response()->json('video removed successfully');
     }

    function public_path($path = null)
    {
        return rtrim(app()->basePath('public/' . $path), '/');
    }
    
    }


