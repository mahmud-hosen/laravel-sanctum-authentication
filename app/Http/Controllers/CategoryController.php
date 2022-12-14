<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\StoreCategorytRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('categories')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //-----------  Validation way : 01 ------------------
        // $validator = Validator::make($request->all(),[
        //     'name' => 'required',
        //     'price' => 'required',
        //     'description' => 'required'
        // ]);

        // if($validator->fails()){
        //     return response($validator->messages(), 200);
        // } else {
        //     $info = new category;
        //     $info->name = $request->name;
        //     $info->price = $request->price;
        //     $info->description = $request->description;
        //     $info->save();

        //     if($info)
        //     {
        //         return response()->json([
        //             'message'=> ['Category Stored']
        //         ]);
        //     } 
        // }


        //--------------- 
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ];

        $customMessages = [
            'required' => 'The :attribute field is required .'
        ];

        $validator = Validator::make( $request->all(), $rules, $customMessages );

        if($validator->fails()){
            return response($validator->messages(), 200);
        } else {
            $info = new category;
            $info->name = $request->name;
            $info->price = $request->price;
            $info->description = $request->description;
            $info->save();

            if($info)
            {
                return response()->json([
                    'message'=> ['Category Stored']
                ]);
            } 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
