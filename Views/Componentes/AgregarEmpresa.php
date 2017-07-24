
			<!-- begin row -->
			<div class="row">
                <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            </div>
                            <h4 class="panel-title">Agregar Empresa</h4>
                        </div>
                        <div class="panel-body">
                            <form id="Empresa">
                                
                                <div class="form-group">
                                    <label for="nombreempresa">Nombre de la empresa:*</label>
                                    <input type="text" class="form-control" id="nombreempresa" name="nombreempresa" placeholder="Nombre de la empresa" data-parsley-required="true" required/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="rfcempresa">RFC de la empresa</label>
                                    <input type="text" class="form-control" id="rfcempresa" name="rfcempresa" placeholder="RFC de la empresa" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="Tiempo">Selecciona un representante de la empresa:</label>
                                    <select name="idclienterepresentante" id="idclienterepresentante" class="form-control" data-parsley-required="true" required>
                                        <option value="">Selecciona un representante de la empresa</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-12 col-sm-12"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <button class="btn btn-success" id="guardar_empresa" name="guardar_empresa">Guardar</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
    <script src="assets/jsduo/anadirempresa.js"></script>