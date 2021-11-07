
<section class="container">

	<div class="row align-items-center justify-content-center">
        <div class="col-md-6">
        <div class="card p-4">
    <h1 class="card-title m-auto">Sign In</h1>
	<form action="<?= base_url('auth/check')?>" method="post" class="card-body" autocomplete="off">
        <?php csrf_field(); ?>
        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
        <?php endif ?>
        <div class="form-group mb-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="john@doe.com" value="<?= set_value('email')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : "" ?></span>
        </div>
        <div class="form-group mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'password') : "" ?></span>
        </div>
        <button class="btn btn-primary form-control btn-block">Sign In</button>
        <br>
        <a class="text-center" href="<?= site_url('auth/signup') ?>">Create Account</a>
    </form>
    </div>
        </div>
    </div>

</section>

