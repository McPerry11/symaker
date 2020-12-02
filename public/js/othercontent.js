var MissionStatementModal = document.getElementById('missionStatementModal');
var VisionStatementModal = document.getElementById('visionStatementModal');
var CoreValuesModal = document.getElementById('coreValuesModal');
var GuidePrincipleModal = document.getElementById('GuidePrincipleModal');
var PrincipleModal = document.getElementById('PrincipleModal');
var addPrinciple = document.getElementById('addPrinciple');
var addBtn = document.getElementById('addBtn');
var deleteModal= document.getElementById('deleteModal');
var outcomeModal = document.getElementById('OutcomeModal');
var outcomeEditModal = document.getElementById('outcomeEditModal');
var addOutcome = document.getElementById('addOutcome');
var delete2Modal = document.getElementById('deleteOutcomeModal')
$('#missionStatementBtn').click(function () {
    MissionStatementModal.style.display = 'block';
});
$('#visionStatementBtn').click(function () {
    VisionStatementModal.style.display = 'block';
});
$('#coreValuesBtn').click(function (){
    CoreValuesModal.style.display = 'block';
});
$('.cls').click(function (){
    MissionStatementModal.style.display = 'none';
    VisionStatementModal.style.display = 'none';
    CoreValuesModal.style.display = 'none';
    PrincipleModal.style.display = 'none';
    GuidePrincipleModal.style.display = 'none';
    addPrinciple.style.display = 'none';
    deleteModal.style.display = 'none'
    outcomeEditModal.style.display='none';
    outcomeModal.style.display='none';
    addOutcome.style.display='none'
    delete2Modal.style.display='none'
});
$('.back').click(function () {
    addPrinciple.style.display = 'none';
    deleteModal.style.display = 'none'
    PrincipleModal.style.display = 'none';
    GuidePrincipleModal.style.display='block';
});
$('.back2').click(function () {
    outcomeModal.style.display='block'
    outcomeEditModal.style.display='none';
    addOutcome.style.display='none'
    delete2Modal.style.display='none'
});
$('#outcomeAdd').click(function () {
    addOutcome.style.display='block'
})
$('#guideBtn').click(function () {
    GuidePrincipleModal.style.display = 'block';
});
$('.edit').click(function (){
    GuidePrincipleModal.style.display = 'none';
    PrincipleModal.style.display = 'block';
});
$('.edit2').click(function () {
    outcomeModal.style.display = 'none';
    outcomeEditModal.style.display = 'block';
});
$('.delete').click(function () {
    GuidePrincipleModal.style.display = 'none';
    deleteModal.style.display = 'block';
});
$('.deleteOutcome').click(function () {
    outcomeModal.style.display = 'none';
    delete2Modal.style.display = 'block';
});
$('#principleAdd').click(function () {
    GuidePrincipleModal.style.display='none';
    addPrinciple.style.display='block';
});
$('#outcomeEdit').click(function () {
    outcomeModal.style.display='block';
});

$(document).ready(function (){

    var table = $('#principleTable').DataTable();

    table.on('click','.edit', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        console.log(data);
        $('#principleContent').val(data[1]);
        $('#ID').val(data[0]);

        $('#editPrinciple').attr('action','/othercontent/principle/'+data[0]);
    });
    table.on('click','.delete', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#deleteForm').attr('action','/othercontent/delete/'+data[0]);
    });

    var table2 = $('#outcomeTable').DataTable();

    table2.on('click','.edit2', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('parent');
        }

        var data = table2.row($tr).data();
        console.log(data);
        $('#outcomeContent').val(data[1]);
        $('#ID').val(data[0]);

        $('#editOutcome').attr('action','/othercontent/outcome/'+data[0]);
    });
    table2.on('click','.deleteOutcome', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('parent');
        }

        var data = table2.row($tr).data();
        console.log(data);

        $('#deleteForm2').attr('action','/othercontent/delete2/'+data[0]);
    });
});
