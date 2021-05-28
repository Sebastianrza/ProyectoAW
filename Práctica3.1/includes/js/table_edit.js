$(document).ready(function(){
    $('#table-data').Tabledit({
        deleteButton: false,
        editButton: false,          
        columns: {
          identifier: [[0, 'Email']]  ,           
          editable: [3, 'Rol']
        },
        hideIdentifier: true,
        url: 'editarCelda.php'      
    });
});