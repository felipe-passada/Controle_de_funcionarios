<!-- Form login -->
<form class="col-md-4 mx-auto mt-3" method="POST" action="<?= base_url('index.php/login/logar') ?>">
    <p class="h5 text-center mb-4">Logar</p>

    <div class="md-form">
        <i class="fa fa-envelope prefix grey-text"></i>
        <input type="text" id="defaultForm-email" class="form-control" name="email" placeholder="Email">

    </div>

    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="defaultForm-pass" class="form-control" name="senha" placeholder="Senha">

    </div>

    <div class="text-center">
        <button class="btn btn- green accent-4">Login</button>
    </div>
    <!-- <? if isset($erro): ?>
      <a class="btn btn-danger" onclick="toastr.error('Hi! I am error message.');">Error Usuario ou Senha incorretos</a>
    <? endif; ?> -->
</form>
<!-- Form login -->
