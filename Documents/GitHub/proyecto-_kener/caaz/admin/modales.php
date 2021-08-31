<!-- vodigo boton

<div class="col-md-6">
                  <button  data-toggle="modal" data-target="#modalNueva" class="btn btn-danger"><span class="fa fa-plus"> Editar</button>  
                
                </div>
-->
<!--  Modal -->
<div>
<div class="modal fade" id="modalNueva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Editar Periodo</h4></center>
                </div>
                
 <div class="line"></div>
              
				
                <form >
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6">
                    <label>Tipo de Periodo</label> 
                    <input name="name" type="text" class="form-control" value="<?php echo $prow['type'];?>" readonly>    
                    </div>
                    <div class="col-md-6">
                    <label>id</label> 
                    <input name="phone" type="text" class="form-control" value="<?php echo $prow['id'];?>" readonly>        
                    </div>
                    <div class="col-md-6">
                    <label>fecha de inicio</label> 
                    <input name="surname" type="text" class="form-control" value="<?php echo $prow['fechai'];?>" readonly>        
                    </div>    
                    
                    <div class="col-md-6">
                    <label>fecha de finalizazion</label> 
                    <input name="email" type="text" class="form-control" value="<?php echo $prow['fechaf'];?>" readonly>    
                    </div>
                    <div  class="col-lg-4">
                        <h5><label>Activa el Periodo</label></h5>
                            <input type="checkbox" name="activo" value="1" id="pure-toggle-4" hidden />
                            <label class="pure-toggle brick" for="pure-toggle-4"></label>
                    </div>
                    </div>
                    </div>
				 </form>
                 
            </div>
        </div>
    </div>
    </div>
<!-- Modal  no terminadoooo-->
