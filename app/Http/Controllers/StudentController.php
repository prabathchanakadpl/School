<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Student[]
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentStoreRequest $request
     * @return JsonResponse
     */
    public function store(StudentStoreRequest $request): JsonResponse
    {
        try{
            $student = new Student();
            $student->first_name = $request->input('first_name');
            $student->last_name = $request->input('last_name');
            $student->grade = $request->input('grade');
            $student->address = $request->input('address');
            $student->email = $request->input('email');
            $student->save();
            return \response()->json('Successfully Saved!!!',200);

        }catch(\Exception $e){
            return \response()->json($e->getMassage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return \response()->json(Student::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try{
            $student = Student::find($id);
            $student->first_name = $request->input('first_name');
            $student->last_name = $request->input('last_name');
            $student->grade = $request->input('grade');
            $student->address = $request->input('address');
            $student->email = $request->input('email');
            $student->save();

            return \response()->json('Successfully Updated!!!',200);

        }catch(\Exception $e){
            return \response()->json($e->getMessage(), 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $student = Student::find($id);
            $student->delete();
            return \response()->json('Successfully Deleted!!!',204);
        } catch (\Exception $e){
            return \response()->json($e->getMessage(), 500);
        }
    }
}
