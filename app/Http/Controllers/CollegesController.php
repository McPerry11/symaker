<?php

namespace App\Http\Controllers;

use Auth;
use App\College;
use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->data == 'users')
            return College::select('id', 'abbrev')->get();
        else if ($request->modal == 'add' || $request->modal == 'edit') {
            if ($request->modal == 'add') {
                if ($request->field == 'abbrev')
                    $identical = College::where('abbrev', $request->data)->count();
                else if ($request->field == 'name')
                    $identical = College::where('collegeName', $request->data)->count();
                else
                    $identical = College::where('colorCode', $request->data)->count();
            } else {
                if ($request->field == 'abbrev')
                    $identical = College::where('abbrev', $request->data)->where('id', '<>', $request->id)->count();
                else if ($request->field == 'name')
                    $identical = College::where('collegeName', $request->data)->where('id', '<>', $request->id)->count();
                else
                    $identical = College::where('colorCode', $request->data)->where('id', '<>', $request->id)->count();
            }
            if ($identical > 0)  {
                if ($request->field == 'abbrev')
                    $request->field = 'abbreviation';
                else if ($request->field == 'color')
                    $request->field == 'color code';
                return response()->json([
                    'status' => 'error',
                    'msg' => 'This ' . $request->field . ' is already taken'
                ]);
            } else {
                return response()->json([
                    'status' => 'success'
                ]);
            }
        } else if ($request->data == 'colleges') {
            if ($request->search == '')
                return College::orderBy('updated_at', 'desc')->get();
            else {
                return College::where('abbrev', 'LIKE', '%' . $request->search . '%')
                ->orWhere('collegeName', 'LIKE', '%' . $request->search . '%')
                ->orderBy('updated_at', 'desc')->get();
            }
        }

        if (Auth::user()->type == 'SYSTEM_ADMIN')
            return view('colleges', [
                'colleges' => College::orderBy('updated_at', 'desc')->get()
            ]);
        else
            return redirect(URL::previous());
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
        $identical = College::where('abbrev', $request->abbrev)->count();
        if ($identical > 0)
            return response()->json([
                'status' => 'error',
                'data' => 'abbrev',
                'msg' => 'This abbreviation is already taken'
            ]);
        $identical = College::where('collegeName', $request->name)->count();
        if ($identical > 0)
            return response()->json([
                'status' => 'error',
                'data' => 'name',
                'msg' => 'This name is already taken'
            ]);
        $identical = College::where('colorCode', $request->color)->count();
        if ($identical > 0)
            return response()->json([
                'status' => 'error',
                'data' => 'color',
                'msg' => 'This color code is already taken'
            ]);

        $college = new College;
        $college->abbrev = strip_tags($request->abbrev);
        $college->collegeName = strip_tags($request->name);
        $college->colorCode = $request->color;
        $college->save();

        Log::create([
            'userID' => Auth::id(),
            'ipAddress' => $request->ip(),
            'details' => Auth::user()->username . ' has added a new college [' . $college->abbrev . '].',
            'created_at' => Carbon::now('+8:00'),
            'updated_at' => Carbon::now('+8:00')
        ]);

        return response()->json([
            'msg' => 'A new college [' . $college->abbrev . '] has been added'
        ]);
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
        return College::select('abbrev', 'collegeName', 'colorCode')->find($id);
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
        $identical = College::where('abbrev', $request->abbrev)->where('id', '<>', $id)->count();
        if ($identical > 0)
            return response()->json([
                'status' => 'error',
                'data' => 'abbrev',
                'msg' => 'This abbreviation is already taken'
            ]);
        $identical = College::where('collegeName', $request->name)->where('id', '<>', $id)->count();
        if ($identical > 0)
            return response()->json([
                'status' => 'error',
                'data' => 'name',
                'msg' => 'This name is already taken'
            ]);
        $identical = College::where('colorCode', $request->color)->where('id', '<>', $id)->count();
        if ($identical > 0)
            return response()->json([
                'status' => 'error',
                'data' => 'color',
                'msg' => 'This color code is already taken'
            ]);

        $college = College::find($id);
        $college->abbrev = strip_tags($request->abbrev);
        $college->collegeName = strip_tags($request->name);
        $college->colorCode = $request->color;
        $college->save();

        Log::create([
            'userID' => Auth::id(),
            'ipAddress' => $request->ip(),
            'details' => Auth::user()->username . ' has updated college [' . $college->abbrev . '].',
            'created_at' => Carbon::now('+8:00'),
            'updated_at' => Carbon::now('+8:00')
        ]);
        
        return response()->json([
            'msg' => 'College [' . $college->abbrev . '] has been updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $college = College::find($id);
        $abbrev = $college->abbrev;

        Log::create([
            'userID' => Auth::id(),
            'ipAddress' => $request->ip(),
            'details' => Auth::user()->username . ' has deleted college [' . $college->abbrev . '].',
            'created_at' => Carbon::now('+8:00'),
            'updated_at' => Carbon::now('+8:00')
        ]);

        $college->delete();
        return response()->json([
            'msg' => 'College [' . $abbrev .'] has been deleted'
        ]);
    }
}
