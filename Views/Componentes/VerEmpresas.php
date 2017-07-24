<div class="row">
    <div class="panel panel-success" data-sortable-id="table-basic-2">
        <div class="panel-heading">
            <div class="panel-heading-btn">
            </div>
            <h4 class="panel-title">Empresas registradas</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="Noti">
                <div class="note note-warning">
                    <h4>No hay registros</h4>
                    <p>
                        Hasta el momento no hay <strong>Empresas</strong> registradas.
                    </p>
                </div>
            </div>
            
            <div class="table-responsive" id="TablaEm">
                <table id="TablaEmpresas" name="TablaEmpresas" class="table table-hover table-bordered nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Id de la empresa</th>
                            <th>Nombre de la empresa</th>
                            <th>RFC de la empresa</th>
                        </tr>
                    </thead>
                    <tbody id="DatosEmpresas">
                       
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="modal-dialogEmp" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Información de la empresa</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="FormularioEmpresas">
                    <div class="form-group" hidden>
                        <label for="IdentificadorEmpresa">Identificador:</label>
                        <input type="text" class="form-control" name="IdentificadorEmpresa" id="IdentificadorEmpresa" placeholder="Id...">
                   </div>
                   <div class="form-group">
                        <label for="NombreEmpresa">Nombre de la empresa:</label>
                        <input type="text" class="form-control" name="NombreEmpresaModal" id="NombreEmpresa" placeholder="Nombre del Empresa..." data-parsley-required="true" >
                   </div>
                   <div class="form-group">
                        <label for="RFCEmpresa">RFC de la empresa:</label>
                        <input type="text" class="form-control" name="RFCEmpresaModal" id="TiempoEmpresa" placeholder="RFC..." data-parsley-required="true">
                   </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <button class="btn btn-sm btn-white resetForm" type="submit" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="ModificarEmpresa" class="btn btn-sm btn-primary resetForm">Modificar información</button>
                        <button class="btn btn-sm btn-danger resetForm" type="submit" id="EliminarEmpresa" data-dismiss="modal">Eliminar información</button>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
               <!--  <a href="javascript:;" class="btn btn-sm btn-white"  data-dismiss="modal">Cerrar</a>
                <a href="javascript:;" class="btn btn-sm btn-primary" id="ModificarEmpresa">Modificar información</a>
                <a href="javascript:;" class="btn btn-sm btn-danger" id="EliminarEmpresa">Eliminar información</a>
                 -->
            </div>
        </div>
    </div>
</div>

<script src="assets/jsduo/ConsultaEmpresas.js"></script>