var tableRoles;
//---------------------------------------------------------------------------------------------------------//
document.addEventListener("DOMContentLoaded", function () {
  tableRoles = $("#tableClientes").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/Clientes/getClientes",
      dataSrc: "",
    },
    columns: [
      { data: "idcliente" },
      { data: "nombre" },
      { data: "direccion" },
      { data: "telefono" },
      { data: "correo" },
      
    ],
    responsive: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

    //NUEVO ROL
  var formClientes = document.querySelector("#formClientes");
  formClientes.onsubmit = function(e){
    e.preventDefault();

    var strNombre = document.querySelector('#txtNombre').value;
    var strDescripcion = document.querySelector('#txtDireccion').value;
    var strNombre = document.querySelector('#txtTelefono').value;
    var strNombre = document.querySelector('#txtCorreo').value;
  
    if(strNombre == '' || strDireccion == '' || intTelefono == '' || strCorreo== '')
    {
      swal("Atención", "Todos los campos son obligatorios.", "error");
      return false;
    }
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    var ajaxUrl = base_url+'/Clientes/setCliente';
    var formData = new FormData(formClientes);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function(){
      
      if(request.readyState === 4 && request.status === 200){

        var objData = JSON.parse(request.responseText);

        if(objData.status)
        {
          $('#modalFormClientes').modal("hide");
          formClientes.reset();
          swal("Clientes MRT", objData.msg, "success");
          tableClientes.api().ajax.reload(function(){
          });
        }else{
            swal("Error", objData.msg, "error");
          }
        }
      }
    }


});

$('#tableClientes').DataTable();
//---------------------------------------------------------------------------------------------------------//
/*/---------------------------------------------------------------------------------------------------------//

function openModal() {

  document.querySelector('#idClientes').value ="";
  document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
  document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
  document.querySelector('#btnText').innerHTML = "Guardar";
  document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
  document.querySelector('#formClientes').reset();

  $('#modalFormClientes').modal('show');
}

//---------------------------------------------------------------------------------------------------------/*/