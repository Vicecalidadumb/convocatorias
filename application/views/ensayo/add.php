<section class="container" id="main">
    <div id="survey_container">
        <div id="middle-wizard">

            <div class="step">
                <?php if ($this->session->flashdata('message')) { ?>
                    <div role="alert" class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php } ?>                
            </div>    

            <div class="step">
                <div class="row">
                    <div class="col-md-12" style="text-align: justify !important;font-size: 16px;">
                        <p style="text-align: justify !important;font-size: 16px;">
                        <h2 class="col-md-12">Presentaci&oacute;n</h2>

                        <br><br>
                        <h2 class="col-md-12">Instrucciones</h2>



                    </div>
                </div>
            </div>          
        </div>
        <div id="bottom-wizard">

            <div class="row">
                <div class="col-md-6" style="text-align: left !important;">
                    <a href="<?php echo base_url('ensayo/logout') ?>" class="btn btn-danger">&nbsp;&nbsp;&nbsp;Salir&nbsp;&nbsp;&nbsp;</a>
                </div>                    
                <div class="col-md-6" style="text-align:right  !important;">                    
                    <a href="<?php echo base_url('ensayo/insert') ?>" class="btn btn-primary">Iniciar el Ensayo Virtual</a>
                </div> 
            </div> 
            <div class="row">
                <div class="col-md-12" style="text-align: left !important;">
                    <br>
                    <h5>
                        <span class="label label-default">
                            Sesion iniciada por:
                            <?php echo $this->session->userdata('USUARIO_NOMBRES') . ' ' . $this->session->userdata('USUARIO_APELLIDOS'); ?>
                        </span>
                    </h5>
                </div>                
            </div>            
        </div>

    </div>
</section>