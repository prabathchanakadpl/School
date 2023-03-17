<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Students::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        try{
            dd("ok");
            $student = new Students();
            $student->first_name = $request->input('first_name');
            $student->last_name = $request->input('last_name');
            $student->grade = $request->input('grade');
            $student->address = $request->input('address');
            $student->email = $request->input('email');
            $result = $student->save();
            

            return \response()->json('success',200);

        }catch(\Exception $e){
            return \response()->json($e->getMassage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Students::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $student = Students::find($id);
            $student->first_name = $request->input('first_name');
            $student->last_name = $request->input('last_name');
            $student->grade = $request->input('grade');
            $student->address = $request->input('address');
            $student->email = $request->input('email');
            $student->save();

            return \response()->json('success',200);

        }catch(\Exception $e){
            return \response()->json($e->getMassage(), 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Students::destroy($id);
    }
}
