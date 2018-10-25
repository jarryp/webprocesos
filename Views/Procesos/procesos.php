<div id="page-wrapper">
    <div id="page-inner">
    <!-- ROW  -->
 <div class="row">
  <div class="col-md-12">

  	<h1 class="page-header">
      Procesos <small>Registro y consulta de procesos</small>
    </h1>

    <div class="row">
    <div class="col-md-12">
     <button type="button"
             class="btn btn-primary"
             id="btn-nuevo"
             onclick="javascript:verventanamodal()">
             Agregar
     </button>
     <div class="panel panel-default">
      <div class="panel-heading">
       Listado General
      </div>

       <div class="panel-body">
       <div class="table-responsive">
       	<table class="display" id="tablaProcesos">
       	 <thead>
         <tr>
          <th>CODIGO</th>
          <th>PROCESO</th>
          <th>DESCRIPCION</th>
          <th>PRESUPUESTO</th>
          <th>CREADO</th>
          <th>EDITAR</th>
          <th>ELIMINAR</th>
         </tr>
         </thead>
         <tbody>
             <?php
              $json= file_get_contents(URL."Procesos/listado");
                      if($json!=NULL){
                      $datos = json_decode($json);
                      foreach($datos as $proceso){
                        echo "<tr>
                            <td> ". $proceso->id_proceso."</td>
                            <td> ". $proceso->nombre ."</td>
                            <td> ". $proceso->descripcion ."</td>
                            <td align='right'> ". number_format($proceso->presupuesto,2,'.',',') ."</td>
                            <td> ". $proceso->created_at ."</td>
                            <td> <button class='btn btn-success' onclick='javascript:verventanamodalEditar($proceso->id_proceso)'>Editar</button> </td>
                            <td> <button class='btn btn-danger' onclick='javascript:elimina_usuario($proceso->id_proceso)'>Elimiar</button></td>
                              </tr>";
                      }
                      }
                     ?>
         </tbody>
       	</table>
       </div> <!-- Fin de div para tabla-->
      </div> <!-- Fin de panel-Body-->

     </div>



    </div>
    </div>

  </div>
 </div>
</div>


<div class="modal"
     id="ventana"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Añadir Proceso</h4>
            </div>
        <div class="modal-body">
            <form role="form">
                <div class="form-group">
                  <input type="hidden" name="id" id="id" />
                  <input class="form-control" type="text" id="nombre" name="nombre" maxlength="60" placeholder="Nombre">
               </div>
               <div class="form-group">
                  <textarea id="descripcion" maxlength="200" class="form-control" placeholder="Ingrese breve descripcion del proceso"></textarea>
               </div>
               <div class="form-group">
               		<select id="cmbSede" class="form-control">
               			<option value="S">--Seleccione Sede--</option>
               			<?php $json= file_get_contents(URL."Sede/listado"); 
               				 if($json!=NULL){
                      			$datos = json_decode($json);
                      			foreach($datos as $sede){
                      				echo "<option value='$sede->id_sede'>$sede->nombre</option>";
                      			}
                      		}//fin condicion evalua JSON
               			?>

               		</select>
               </div>
               <div class="form-group">
               		<input type="text" name="presupuesto" class="form-control" id="presupuesto" placeholder="Monto Presupuesto Ejemplo: 12569.36">
               </div>
                  <button type="button"
                          class="btn btn-primary"
                          onclick="javascript:envia_proceso()">Guardar</button>
             </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        <div id="area_mensaje">
        	
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
	
	$(document).ready(function(){
                $("#tablaProcesos").DataTable({
                    "order": [[4, "desc"]],
                    "language":{
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrada de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "processing":     "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords":    "No se encontraron registros coincidentes",
                        "paginate": {
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        },
                    }
                });

                cargarFuenteFinan();


            });

	function verventanamodal(){
       $("#nombre").val("");
       document.getElementById("descripcion").value = "";
       $("#ventana").modal("show");
       document.getElementById("nombre").focus();
    }


    function envia_proceso(){
    	var xid          = $("#id").val();
    	var xnombre      = $("#nombre").val();
    	var xcmbsede     = $("#cmbSede").val();
    	var xdescripcion = $("#descripcion").val();
    	var xpresupuesto = $("#presupuesto").val();

    	if(xnombre.trim()!="" && xcmbsede.trim()!="" && xdescripcion.trim()!=""){
    		
    		if(xid.trim()==""){
    			//codigo para agregar
    			$.ajax({
    				type:"GET",
    				url: "<?php echo URL;?>Procesos/create",
    				data:{id:xid,
    					  nombre:xnombre,
    					  cmbsede:xcmbsede,
    					  descripcion:xdescripcion,
    					  presupuesto:xpresupuesto},
    				success:function(response){
    					$("#area_mensaje").html(response);
    				}
    			});
    		}else{
    			//codigo para modificar
    		}

    	}else{
    		alert("Campos requeridos vacios");
    	}
    }

</script>