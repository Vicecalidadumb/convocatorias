<div class="container bs-docs-container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary"> 
                <?php echo $oferta[0]->EMPLEO_DESCRIPCION; ?>
            </h2>
            <hr>
        </div>
        <div class="col-md-6">
            <div class="bs-callout bs-callout-danger">
                <h4><span class="glyphicon glyphicon-flag"></span> Perfil del Empleo</h4>
                <p style="text-align: justify !important;">
                    <?php echo $oferta[0]->PERFIL; ?>
                </p>
            </div>
            <div class="bs-callout bs-callout-info">
                <h4><span class="glyphicon glyphicon-book"></span> Proposito</h4>
                <p style="text-align: justify !important;">
                    <?php echo $oferta[0]->EMPLEO_PROPOSITO; ?>
                </p>
            </div>  
        </div>
        <div class="col-md-6">
            <div class="bs-callout bs-callout-warning">
                <h4><span class="glyphicon glyphicon-info-sign"></span> Detalles del Empleo</h4>
                <table class="table table-striped">
                    <tr>
                        <td style="width: 30%"><strong>Codigo del Empleo</strong></td>
                        <td>
                            <?php echo 'UMB2014' . str_pad($oferta[0]->EMPLEO_ID, 4, "0", STR_PAD_LEFT); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Salario</strong></td>
                        <td>
                            <?php echo '$' . number_format($oferta[0]->EMPLEO_SALARIO, 0, "'", '.'); ?>
                        </td>                         
                    </tr>
                    <tr>
                        <td><strong>Grado</strong></td>
                        <td>
                            <?php echo $oferta[0]->EMPLEO_GRADO ?>
                        </td>                         
                    </tr>
                    <tr>
                        <td><strong>Vacantes</strong></td>
                        <td>
                            <?php echo $oferta[0]->EMPLEO_VACANTES ?>
                        </td>                         
                    </tr> 
                    <tr>
                        <td><strong>Experiencia</strong></td>
                        <td>
                            <?php echo $oferta[0]->EMPLEO_EXPERIENCIA ?>
                        </td>                         
                    </tr>                    
                    <tr>
                        <td>
                            <strong>Regiones</strong>
                        </td>
                        <td>
                            <?php
                            $ARRAY_regiones = explode('-', $oferta[0]->REGIONES);
                            foreach ($ARRAY_regiones as $region) {
                                ?>
                                <a href="<?php echo base_url('ofertas/index/' . $region) ?>" class="btn btn-default" style="margin-bottom: 2px;">
                                    <?php echo $region; ?>
                                </a>
                                <?php
                            }
                            ?>
                        </td>                         
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <?php if ($this->session->userdata('logged_in')) { ?>
                                <a href="<?php echo base_url('ofertas/aplicar/'.'UMB2014' . str_pad($oferta[0]->EMPLEO_ID, 4, "0", STR_PAD_LEFT)) ?>" class="btn btn-success btn-lg" href="" role="button">
                                    Aplicar a Esta Oferta
                                    <span class="glyphicon glyphicon-ok"></span>
                                </a>
                            <?php } else { ?>
                            <a href="<?php echo base_url('ingreso/convocatoria/'.  encrypt_id(1).'/'.'UMB2014' . str_pad($oferta[0]->EMPLEO_ID, 4, "0", STR_PAD_LEFT)) ?>" class="btn btn-warning btn-lg" title="Debe iniciar sesi&oacute;n para aplicar a esta oferta" role="button">
                                    Iniciar sesi&oacute;n o Registrarse Ahora
                                    <span class="glyphicon glyphicon-user"></span>
                                </a>
                                <br>
                                <span class="label label-danger">
                                    Debe iniciar sesi&oacute;n para aplicar a esta oferta
                                </span>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>            
        </div>

        <div class="col-md-12">
            <div class="bs-callout bs-callout-danger">
                <h4><span class="glyphicon glyphicon-tasks"></span> Actividades</h4>
                <ul class="list-group">
                    <?php foreach ($oferta as $actividad) { ?>
                        <li class="list-group-item">
                            <span class="glyphicon glyphicon-ok-circle"></span> <?php echo $actividad->ACTIVIDAD_NOMBRE; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>        

        <div class="col-md-12">
            <hr>
            <h2 class="text-primary"><span class="glyphicon glyphicon-star text-warning"></span> Otras ofertas destacadas</h2>

            <?php
            //echo '<pre>' . print_r($ofertas_perfil, true) . '</pre>';
            foreach ($ofertas as $oferta) {
                ?>
                <li class="media">
                    <!--<a class="pull-left" href="#">
                            <img class="media-object" alt="64x64" src="<?php echo base_url("images/vice/64/programming_64x64.png") ?>" style="width: 64px; height: 64px;">
                        </a>-->
                    <div class="media-body">
                        <h3 class="media-heading">
                            <?php echo $oferta->EMPLEO_DESCRIPCION ?> <small><?php echo 'UMB2014' . str_pad($oferta->EMPLEO_ID, 4, "0", STR_PAD_LEFT); ?></small>
                        </h3>
                        <h4 class="media-heading">
                            <small>Perfil: </small><?php echo $oferta->PERFIL ?>
                        </h4>                    

                        <p class="text-primary">
                            <strong><small>Proposito: </small></strong><?php echo $oferta->EMPLEO_PROPOSITO; ?>
                            <br>
                            <span class="label label-default">
                                Salario: $<?php echo number_format($oferta->EMPLEO_SALARIO, 0, "'", '.'); ?>
                            </span>
                            <?php
                            $ARRAY_regiones = explode('-', $oferta->REGIONES);
                            foreach ($ARRAY_regiones as $region) {
                                ?>
                                <a href="<?php echo base_url('ofertas/index/' . $region) ?>" style="margin-left: 5px;" class="label label-primary">
                                    <?php echo $region; ?>
                                </a>
                                <?php
                            }
                            ?>                           
                        </p>
                        <a href="<?php echo base_url('ofertas/informacion/' . encrypt_id_v2($oferta->EMPLEO_ID)) ?>" class="btn btn-warning btn-xs">
                            Mas Informaci&oacute;n
                            <span class="glyphicon glyphicon-share-alt"></span>
                        </a>                    
                    </div>
                </li>
            <?php } ?>
        </div>
    </div>
</div>
<br><br><br>

<script>
    $(document).ready(function() {
        $('#tooltip').tooltip(options)
    })

</script>