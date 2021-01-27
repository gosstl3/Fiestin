<!-- Modal -->
<div class="modal fade" id="modalFormProveedor" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formProveedor" name="formProveedor">
                <input type="hidden" id="idProveedor" name="idProveedor" value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del Cliente" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Direccion</label>
                  <input class="form-control" id="txtDescripcion" name="txtDescripcion" type="text" placeholder="Direccion del Cliente" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Telefono</label>
                  <input class="form-control" id="txtTelefono" name="txtTelefono" type="text" placeholder="Telefono del Cliente" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Correo</label>
                  <input class="form-control" id="txtCorreo" name="txtCorreo" type="text" placeholder="Correo del Cliente" required="">
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>