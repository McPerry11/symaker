@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/settings-switch.css') }}">
<link rel="stylesheet" href="{{ asset('css/settings.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('body')
<div style="text-align: center">
    <img src="{{ asset('img/UniversityOfTheEastLogo.PNG') }}" alt="" style="height: 150px; width: 150px;">
</div>
<div style="padding-bottom: 40px">
     <div class="subtitle is-3">University Mission Statement
        <hr class="settings-hr">
     </div>
    <div id="Mission">
        <p style="font-size: 1.25em;">{{trim($contentTable->where('title','=','MissionStatement')->pluck('content'),'["]')}}
        </p>
    </div>
    <button class="button is-info" id="missionStatementBtn" style="float: right"><span class="icon"></span>Edit</button>
</div>
<div style="padding-bottom: 40px">
    <div class="subtitle is-3">University Vision Statement
        <hr class="settings-hr">
    </div>
    <div id="Vission">
        <p style="font-size: 1.25em;">
            {{trim($contentTable->where('title','=','VisionStatement')->pluck('content'),'["]')}}
        </p>
    </div>
    <button class="button is-info" id="visionStatementBtn" style="float: right"><span class="icon"></span>Edit</button>
</div>
<div style="padding-bottom: 40px">
    <div class="subtitle is-3">University Core Values
        <hr class="settings-hr">
    </div>
    <div id="Values">
        <p style="font-size: 1.25em;">
            {{trim($contentTable->where('title','=','CoreValues')->pluck('content'),'["]')}}
        </p>
    </div>
    <button class="button is-info" id="coreValuesBtn" style="float: right"><span class="icon"></span>Edit</button>
</div>
<div style="padding-bottom: 40px">
    <div class="subtitle is-3">University Guiding Principle
        <hr class="settings-hr">
    </div>
    <div id="Principle">
        <p style="font-size: 1.25em;">
            The Institution declares the following to be its guiding principles:
        <ol style="font-size: 1.25em; padding-left: 50px">
            @foreach($principleTable as $row)
                <li style="padding-bottom: 10px">{{$row->content}}</li>
            @endforeach
        </ol>
        </p>
    </div>
    <button class="button is-info" id="guideBtn" style="float: right"><span class="icon"></span>Edit</button>
</div>
<div style="padding-bottom: 40px">
    <div class="subtitle is-3">University Institutional Outcome
        <hr class="settings-hr">
    </div>
    <div id="Outcome">
        <p style="font-size: 1.25em;">
            In pursuit of its vision and mission, the University will produce GRADUATES
        <ul style="list-style-type: circle; padding-left: 40px; font-size: 1.25em">
            @foreach($outcomeTable as $row)
            <li style="padding-bottom: 10px">{{$row->content}}</li>
            @endforeach
        </ul>
        </p>
    </div>
    <button class="button is-info" id="outcomeEdit" style="float: right"><span class="icon"></span>Edit</button>
</div>
{{--Mission Statement Edit Modal--}}
<div id="missionStatementModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="othercontent/{{trim($contentTable->where('title','=','MissionStatement')->pluck('id'),'["]')}}" enctype="multipart/form-data" method="POST" id="editMissionStatement">
                @csrf
                {{ method_field('PATCH') }}
                <div class="subtitle is-3">University Mission Statement
                    <hr class="settings-hr">
                </div>
                <h1>Content</h1>
                <textarea name="content" id="cntnt" cols="30" rows="10" style="width: 45em">{{trim($contentTable->where('title','=','MissionStatement')->pluck('content'),'["]')}}</textarea>
                <button id="save">Save</button>
            </form>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>
</div>
{{--Vision Statement Edit Modal--}}
<div id="visionStatementModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="othercontent/{{trim($contentTable->where('title','=','VisionStatement')->pluck('id'),'["]')}}" enctype="multipart/form-data" method="POST" id="editMissionStatement">
                @csrf
                {{ method_field('PATCH') }}
                <div class="subtitle is-3">University Vision Statement
                    <hr class="settings-hr">
                </div>
                <h1>Content</h1>
                <textarea name="content" id="cntnt" cols="30" rows="10" style="width: 45em">{{trim($contentTable->where('title','=','VisionStatement')->pluck('content'),'["]')}}</textarea>
                <button id="save">Save</button>
            </form>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>
</div>
{{--Core Values Edit Modal--}}
<div id="coreValuesModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="othercontent/{{trim($contentTable->where('title','=','CoreValues')->pluck('id'),'["]')}}" enctype="multipart/form-data" method="POST" id="editMissionStatement">
                @csrf
                {{ method_field('PATCH') }}
                <div class="subtitle is-3">University Core Values
                    <hr class="settings-hr">
                </div>
                <h1>Content</h1>
                <textarea name="content" id="cntnt" cols="30" rows="10" style="width: 45em">{{trim($contentTable->where('title','=','CoreValues')->pluck('content'),'["]')}}</textarea>
                <button id="save">Save</button>
            </form>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>
</div>
{{--Guiding Principle Edit Modal--}}
<div id="GuidePrincipleModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <table class="table is-fullwidth is-striped" id="principleTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>content</th>
                    <th>
                        <button class="button is-info is-fullwidth" title="Add Principle" id="principleAdd">
                            <span class="icon is-small"><i class="fas fa-plus"></i></span>Add Princple
                        </button>
                        <button id="closeBtn" class="cls">close</button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($principleTable as $rows)
                    <tr>
                        <td>{{$rows->id}}</td>
                        <td>{{$rows->content}}</td>
                        <td>
                            <div class="buttons is-right">
                                <button class="button edit"><span class="icon"><i class="fas fa-edit"></i></span></button>
                                <button class="button is-danger is-inverted delete"><span class="icon"><i class="fas fa-trash"></i></span></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--Guiding Principle Edit Entry Modal--}}
<div id="PrincipleModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="othercontent" enctype="multipart/form-data" method="POST" id="editPrinciple">
                @csrf
                {{ method_field('PATCH') }}
                <div class="subtitle is-3">Guiding Principle
                    <hr class="settings-hr">
                </div>
                <h1></h1>
                <textarea name="principleContent" id="principleContent" cols="30" rows="10" style="width: 45em" required></textarea>
                <button id="save">Save</button>
            </form>
            <button id="backBtn" class="back">Back</button>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>>
</div>
{{--Principle Add Modal--}}
<div id="addPrinciple" class="modal set" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="othercontent/add" enctype="multipart/form-data" method="POST" id="editMissionStatement">
                @csrf
                <div class="subtitle is-3">Guiding Principle
                    <hr class="settings-hr">
                </div>
                <h1>Type</h1>
                <select name="Type" id="Type">
                    <option value="University">University</option>
                    @foreach($collegeTable as $option)
                        <option value="{{$option->abbrev}}">{{$option->abbrev}}</option>
                    @endforeach
                </select>
                <h1>Content</h1>
                <textarea name="content" id="cntnt" cols="30" rows="10" style="width: 45em" required></textarea>
                <button id="save">Save</button>
            </form>
            <button id="backBtn" class="back">Back</button>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>>
</div>
{{--Delete Principle Modal--}}
<div id="deleteModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            Are you sure You want to delete this entry?
            <form method="POST" enctype="multipart/form-data" action="" id="deleteForm">
                @csrf
                {{ method_field('DELETE') }}
                <button id="yes">yes</button>
            </form>
            <button id="backBtn" class="back">Back</button>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>
</div>
{{--Institutional Outcome Edit Modal--}}
<div id="OutcomeModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <table class="table is-fullwidth is-striped" id="outcomeTable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>content</th>
                    <th>
                        <button class="button is-info is-fullwidth" title="Add Outcome" id="outcomeAdd">
                            <span class="icon is-small"><i class="fas fa-plus"></i></span>Add Outcome
                        </button>
                        <button id="closeBtn" class="cls">close</button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($outcomeTable as $rows)
                    <tr>
                        <td>{{$rows->id}}</td>
                        <td>{{$rows->content}}</td>
                        <td>
                            <div class="buttons is-right">
                                <button class="button edit2"><span class="icon"><i class="fas fa-edit"></i></span></button>
                                <button class="button is-danger is-inverted deleteOutcome"><span class="icon"><i class="fas fa-trash"></i></span></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--Institutional Outcome Edit Entry Modal--}}
<div id="outcomeEditModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="othercontent" enctype="multipart/form-data" method="POST" id="editOutcome">
                @csrf
                {{ method_field('PATCH') }}
                <div class="subtitle is-3">Institutional Outcome
                    <hr class="settings-hr">
                </div>
                <h1></h1>
                <textarea name="outcomeContent" id="outcomeContent" cols="30" rows="10" style="width: 45em" required></textarea>
                <button id="save">Save</button>
            </form>
            <button id="backBtn" class="back2">Back</button>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>>
</div>
{{--Outcome Add Modal--}}
<div id="addOutcome" class="modal set" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            <form action="othercontent/add2" enctype="multipart/form-data" method="POST" id="editMissionStatement">
                @csrf
                <div class="subtitle is-3">Guiding Principle
                    <hr class="settings-hr">
                </div>
                <h1>Type</h1>
                <select name="Type" id="Type">
                    <option value="University">University</option>
                    @foreach($collegeTable as $option)
                        <option value="{{$option->abbrev}}">{{$option->abbrev}}</option>
                    @endforeach
                </select>
                <h1>Content</h1>
                <textarea name="content" id="cntnt" cols="30" rows="10" style="width: 45em" required></textarea>
                <button id="save">Save</button>
            </form>
            <button id="backBtn" class="back2">Back</button>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>>
</div>
{{--Delete delete Outcome Modal--}}
<div id="deleteOutcomeModal" class="modal" style="padding-top: 100px">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box">
            Are you sure you want to delete?
            <form method="POST" enctype="multipart/form-data" action="" id="deleteForm2">
            @csrf
            {{ method_field('DELETE') }}
            <button id="yes">yes</button>
            </form>
            <button id="backBtn" class="back2">back</button>
            <button id="closeBtn" class="cls">close</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/othercontent.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
    </script>
@endsection
