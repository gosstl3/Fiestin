var tableRoles;
var btnEditRol;
//---------------------------------------------------------------------------------------------------------//
document.addEventListener("DOMContentLoaded", function () {
  tableRoles = $("#tableRoles").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: " " + base_url + "/Roles/getRoles",
      dataSrc: "",
    },
    columns: [
      { data: "idrol" },
      { data: "nombrerol" },
      { data: "descripcion" },
      { data: "estatus" },
      { data: "options" },
    ],
    responsive: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

    //NUEVO ROL
  var formRol = document.querySelector("#formRol");
  formRol.onsubmit = function(e){
    e.preventDefault();

    var strNombre = document.querySelector('#txtNombre').value;
    var strDescripcion = document.querySelector('#txtDescripcion').value;
    var intEstatus = document.querySelector('#listStatus').value;
    if(strNombre == '' || strDescripcion == '' || intEstatus == '')
    {
      swal("Atención", "Todos los campos son obligatorios.", "error");
      return false;
    }
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    var ajaxUrl = base_url+'/Roles/setRol';
    var formData = new FormData(formRol);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function(){
      
      if(request.readyState === 4 && request.status === 200){

        var objData = JSON.parse(request.responseText);

        if(objData.status)
        {
          $('#modalFormRol').modal("hide");
          formRol.reset();
          swal("Roles de usaurio", objData.msg, "success");
          tableRoles.api().ajax.reload(function(){
           // fntEditRol();
           // fntDelRol();
           // fntPermisos();
          });
        }else{
            swal("Error", objData.msg, "error");
          }
        }
      }
    }


});
//---------------------------------------------------------------------------------------------------------//

$('#tableRoles').DataTable();

function openModal() {

  document.querySelector('#idRol').value ="";
  document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
  document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
  document.querySelector('#btnText').innerHTML = "Guardar";
  document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
  document.querySelector('#formRol').reset();

  $('#modalFormRol').modal('show');
  $('#modalFormEditRol').modal('show');
}

//---------------------------------------------------------------------------------------------------------//
//Esta funcion agrega el evento load cuando se carga el documento, y ejecuta la funcion, la funcion hace el llamado de la fntEditRol.
window.addEventListener('load', function () {
    setTimeout(() => {
      fntEditRol();
    }, 500);
  },
  false
);

function fntEditRol(){
  var btnEditRol = document.querySelectorAll(".btnEditRol");
  btnEditRol.forEach(function(btnEditRol){
        btnEditRol.addEventListener('onclick', function(){


          document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
          document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
          document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
          document.querySelector('#btnText').innerHTML = "Actualizar";

          //manda llamar el atributo rl en html, para asi tomar el id del rol. 
          var idrol = this.getAttribute("rl");
          // VALIDAR EN QUE NAVEGADOR ESTAMOS PARA CREAR LA PETICION CORRECTA.
          var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
          // ESTO NOS DEVUELVE LA RUTA RAIZ DEL PROYECTO, ALGO ASI (http://localhost/Fiestin/roles/getrol/23)
          var ajaxUrl = base_url+'/Roles/getRol/'+idrol;
          // ABRE LA CONEXION A LA BD Y MANDA COMO PARAMETRO EL METODO GET, Y LA URL DONDE HACE LA PETICION.
          request.open("GET", ajaxUrl, true);
          // ENVIAR LA PETICION.
          request.send();

          // REQUEST OBTIENE LA RESPUESTA 
            // SE VALIDA EL ESTADO DE LA RESPUESTA
              // SE PARSEA LA  RESPUESTA AJAX PARA CONVERTIRLA EN UN OBJETO JSON 
              request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        document.querySelector("#idRol").value = objData.data.idrol;
                        document.querySelector("#txtNombre").value = objData.data.nombrerol;
                        document.querySelector("#txtDescripcion").value = objData.data.descripcion;

                        if(objData.data.status == 1)
                        {
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        }else{
                            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        }
                        var htmlSelect = `${optionSelect}
                                          <option value="1">Activo</option>
                                          <option value="2">Inactivo</option>
                                        `;
                        document.querySelector("#listStatus").innerHTML = htmlSelect;
                        $('#modalFormRol').modal('show');
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
            }
            
        });
    });
}
//---------------------------------------------------------------------------------------------------------//
