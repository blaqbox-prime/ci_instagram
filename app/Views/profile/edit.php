<section class="container">
    <h1 class="display-1"><?= $title ?></h1>
    <form action="<?= base_url('profile/update') ?>" method="post"  enctype="multipart/form-data" autocomplete="off">
        <?= csrf_field()?>
        <!-- Success or failure message -->
        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail')?></div>
            <?php endif; ?>
            <?php if(!empty(session()->getFlashdata('sucesss'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('sucesss')?></div>
            <?php endif; ?>
        <!-- ============================================================ -->
        <div class="form-group">
            <label for="caption" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= isset($name) ? $name : "" ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : ""?></span>

        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= isset($username) ? $username : "" ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'username') : ""?></span>
        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">Category</label>
            <select class="form-select" name="category" id="category">
                <option value='' selected disabled hidden>Select a category</option>
                
                <?php foreach (['Personal Blog', "Artist", "Clothing Brand", "Super Hero", "Super Villain"] as $option):?>
                    <option value="<?= $option ?>"
                     <?php if($option == isset($category) ? $category : "" ):?> selected <?php endif?> >
                         <?= $option ?>
                    </option>
                <?php endforeach ?>
                
            </select>
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'category') : ""?></span>
        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">Website</label>
            <input type="text" class="form-control" name="website" id="website" value="<?= isset($website) ? $website : "" ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'website') : ""?></span>
        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">Bio</label>
            <textarea class="form-control" name="bio" id="bio" ><?= isset($bio) ? $bio : "" ?></textarea>
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'bio') : ""?></span>
        </div>

        <!-- -------------------------------------------------------- -->
        <div class="form-group mt-3">
            <label for="post-img" class="form-label">Upload Profile Picture</label>
            <input type="file" class="form-control" name="profileImg" id="profileImg">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'profileImg') : ""?></span>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary form-control">Update Profile</button>
        </div>



    </form>
</section>