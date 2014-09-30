<div class="container bs-docs-container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary"> 
                <?php echo $oferta[0]->EMPLEO_DESCRIPCION; ?>
            </h2>
            <hr>

            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php } ?>            

        </div>
        <div class="col-md-12">
            <div class="jumbotron" style="padding-top: 15px !important;">
                <div style="text-align: center">
                    <h4>Aplicar al Empleo <?php echo 'UMB2014' . str_pad($oferta[0]->EMPLEO_ID, 4, "0", STR_PAD_LEFT); ?></h4>
                </div>
                <span class="label label-primary">
                    Por favor Seleccione maximo dos (2) y minimo una (1) region en orden de preferencia 
                    para aplicar a la oferta.
                </span>
                <hr>
                <div class="row">
                    <?php echo form_open('ofertas/aplicar_insert/' . 'UMB2014' . str_pad($oferta[0]->EMPLEO_ID, 4, "0", STR_PAD_LEFT), 'id="register_insert" class="form-signin" role="form" method="POST" autocomplete="off"'); ?>

                    <?php
                    $regiones = array('' => '--Seleccione una Region--');
                    $ARRAY_regiones = explode('-', $oferta[0]->REGIONES_ID);
                    foreach ($ARRAY_regiones as $region) {
                        $separar = explode(',', $region);
                        $regiones[$separar[0]] = $separar[1];
                    }
                    for ($a = 1; $a <= $convocatoria[0]->MAXIMO_REGIONES; $a++) {
                        ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Region <?php echo $a; ?></label>
                                <span id="lugar_de_nacimiento">
                                    <?php echo form_dropdown('region_' . $a, $regiones, '', 'class="form-control" tabindex=8'); ?>
                                </span>
                            </div>
                        </div>                         
                        <?php
                    }
                    ?>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success" role="button">
                            Aplicar
                            <span class="glyphicon glyphicon-ok"></span>
                        </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
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
        </div>
    </div>
    <br><br><br>
</div>