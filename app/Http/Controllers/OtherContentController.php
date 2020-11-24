<?php

namespace App\Http\Controllers;

use App\College;
use App\guidingPrinciple;
use App\institutionalOutcome;
use App\OtherContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OtherContentController extends Controller
{
    public function index()
    {
        $contentTable = OtherContent::all();
        $principleTable= guidingPrinciple::all();
        $outcomeTable=institutionalOutcome::all();
        $collegeTable=College::all();
        $joinedTable=DB::table('users')->
        join('colleges','colleges.id','=','users.collegeID')->get();
        return view('other',compact('contentTable','principleTable','outcomeTable','collegeTable','joinedTable'));
    }

    public function update(Request $request,$id)
    {
        $table = OtherContent::find($id);
        if ($table->content != $request->input('content')){
            $table->content = $request->input('content');
        }
        $table->save();
        return redirect('othercontent');
    }

    public function principleUpdate(Request $request,$id)
    {
        $table = guidingPrinciple::find($id);
        if ($table->content != $request->input('principleContent')){
            $table->content = $request->input('principleContent');
        }
        $table->save();
        return redirect('othercontent');
    }

    public function addPrinciple(Request $request)
    {
        $principle = new guidingPrinciple;
        $principle->type = $request->input('Type');
        $principle->content = $request->input('content');
        $principle->save();
        return redirect('othercontent');
    }

    public function delete($id)
    {
        $principle = guidingPrinciple::find($id);
        $principle->delete();
        return redirect('othercontent');
    }

    public function outcomeUpdate(Request $request,$id)
    {
        $table = institutionalOutcome::find($id);
        if ($table->content != $request->input('outcomeContent')){
            $table->content = $request->input('outcomeContent');
        }
        $table->save();
        return redirect('othercontent');
    }

    public function addOutcome(Request $request)
    {
        $outcome = new institutionalOutcome;
        $outcome->type = $request->input('Type');
        $outcome->content = $request->input('content');
        $outcome->save();
        return redirect('othercontent');
    }

    public function deleteOutcome($id)
    {
        $principle = institutionalOutcome::find($id);
        $principle->delete();
        return redirect('othercontent');
    }
}
