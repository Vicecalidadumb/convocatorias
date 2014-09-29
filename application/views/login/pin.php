<div class="container">
    <?php echo form_open('ingreso/recordar_pin_envio', 'class="form-signin" role="form" autocomplete="off"'); ?>
    <img src="<?php echo base_url($convocatoria[0]->CONVOCATORIA_IMAGEN); ?>" style="width: 100% ;">
    <h4><?php echo $convocatoria[0]->CONVOCATORIA_NOMBRE ?></h4>
    <h2 class="form-signin-heading">Recordatorio de PIN de Inscripci&oacute;n</h2>

    <br>
    <h4 class="form-signin-heading" style="color:red !important;">Para recordar el PIN de Inscripci&oacute;n, 
        por favor introduzca su numero de documento y la dirección de correo electr&oacute;nico.
    </h4>
    <?php echo form_input('username', '', 'class="form-control" placeholder="Documento" autofocus') ?>
    <?php echo form_input('email', '', 'class="form-control" placeholder="Correo Electronico" autofocus') ?>
    <br>
    <button class="btn btn-lg btn-warning btn-block loading-example-btn" data-loading-text="Enviando Correo..." type="submit">Recordar Pin</button>

    <?php echo form_close(); ?> 
    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php } ?>

    <br><br><br><br><br>
</div> <!-- /container -->

