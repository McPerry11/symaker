<?php

namespace App\Http\Controllers;

use App\College;
use App\guidingPrinciple;
use App\institutionalOutcome;
use App\OtherContent;
use Illuminate\Http\Request;

class OtherContentController extends Controller
{
    public function index()
    {
        $contentTable = OtherContent::all();
        $principleTable= guidingPrinciple::Where('type','=','University')->get();
        $outcomeTable=institutionalOutcome::all();
        $collegeTable=College::all();
        return view('other',compact('contentTable','principleTable','outcomeTable','collegeTable'));
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
}
