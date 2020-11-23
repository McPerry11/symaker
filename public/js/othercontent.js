var MissionStatementModal = document.getElementById('missionStatementModal');
var VisionStatementModal = document.getElementById('visionStatementModal');
var CoreValuesModal = document.getElementById('coreValuesModal');
var GuidePrincipleModal = document.getElementById('GuidePrincipleModal');
var PrincipleModal = document.getElementById('PrincipleModal');
var addPrinciple = document.getElementById('addPrinciple');
var addBtn = document.getElementById('addBtn');
var deleteModal= document.getElementById('deleteModal');
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
});
$('.back').click(function () {
    addPrinciple.style.display = 'none';
    deleteModal.style.display = 'none'
    PrincipleModal.style.display = 'none';
    GuidePrincipleModal.style.display='block';
});
$('#guideBtn').click(function () {
    GuidePrincipleModal.style.display = 'block';
});
$('.edit').click(function (){
    GuidePrincipleModal.style.display = 'none';
    PrincipleModal.style.display = 'block';
});
$('.delete').click(function () {
    GuidePrincipleModal.style.display = 'none';
    deleteModal.style.display = 'block';
});
$('#principleAdd').click(function () {
    GuidePrincipleModal.style.display='none';
    addPrinciple.style.display='block';
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
});
