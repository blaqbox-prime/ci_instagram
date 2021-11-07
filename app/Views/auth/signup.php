

<!-- CONTENT -->

<section class="container-sm ">

	<div class="row align-items-center justify-content-center">
        <div class="col-6">
        <div class="card p-4">
    <h1 class="card-title m-auto">Sign Up</h1>
	<form action="<?= base_url('auth/save') ?>" method="POST" class="card-body" autocomplete="off">
        <?= csrf_field();?>
        <!-- Success or failure message -->
            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail')?></div>
            <?php endif; ?>
            <?php if(!empty(session()->getFlashdata('sucesss'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('sucesss')?></div>
            <?php endif; ?>
        <!-- ============================================================ -->
    <div class="form-group mb-4 md-3" >
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" value="<?= set_value('name')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : ""?></span>
        </div>
        <!--     ===========================================================      -->
        <div class="form-group mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="john_doe" value="<?= set_value('username')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'username') : ""?></span>
        </div>
        <!--   ================================================================    -->
        <div class="form-group mb-4">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="john@doe.com" value="<?= set_value('email')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : ""?></span>
        </div>
        <!--    ================================================================     -->
        <div class="form-group mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'password') : ""?></span>
        </div>
        <!--     ======================================================================      -->
        <div class="form-group mb-4">
            <label for="password_confirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'cpassword') : ""?></span>
        </div>
        <!--    =============================================================================    -->
        <button type='submit' class="btn-primary form-control py-2">Sign Up</button>
    </form>
    <br>
    <a class="text-center" href="<?= site_url('auth/') ?>">I already have an account</a>
    </div>
        </div>
    </div>

</section>

