<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulos;

class ArticulosController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articulos = articulos::all();
       return $articulos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulos = new articulos();
        $articulos->des_art = $request->des_art;
        $articulos->subtipo = $request->subtipo;

        $articulos->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $articulos=articulos::findOrFail($request->id);
        $articulos->des_art = $request->des_art;
        $articulos->subtipo = $request->subtipo;
        $articulos->save();
        return $articulos;



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $articulos=articulos::destroy($request->id);
        return $articulos;

    }
//metodo con json para probar si funciona con postman
    public function getArticulos(){
        return response()->json(articulos::all(),200);
    }

    public function getArticulosxid($id){
        $articulos = articulos::find($id);
        if(is_null($articulos)){
            return response () -> json(['Mensaje'=>'Registro no encontrado'],404);
        } 
        return response ()->json($articulos::find($id),200);
    }

    public function insertArticulos(Request $request){
        $articulos = articulos::create ($request->all());
        return response($articulos,200);
    }

    public function updateArticulos(Request $request,$id){
        $articulos=articulos::find($id);
        if (is_null($articulos)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
         }
        $articulos->update($request->all());
        return response($articulos,200);
    }

    public function deleteArticulos($id){
        $articulos=articulos::find($id);
        if (is_null($articulos)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
         }
         $articulos->delete();
         return response()->json(['Mensaje'=>'Registro Eliminado'],200);
    }

}
