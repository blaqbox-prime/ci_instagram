<section class="container">
    <h1 class="display-1"><?= $title ?></h1>
    <form action="<?= base_url($username.'/post/save') ?>" method="post"  enctype="multipart/form-data">
        <?= csrf_field()?>
        <div class="form-group">
            <label for="caption" class="form-label">name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : ""?></span>

        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'username') : ""?></span>
        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">category</label>
            <select class="form-select" name="category" id="category" value="<?= set_value('category')?>">
                <option value=""></option>
                <option value="Personal Blog">Personal Blog</option>
                <option value="Artist">Artist</option>
                <option value="Clothing Brand">Clothing Brand</option>
                <option value="Super Hero">Super Hero</option>
                <option value="Super Villain">Super Villain</option>
            </select>
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'category') : ""?></span>
        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">website</label>
            <input type="text" class="form-control" name="website" id="website" value="<?= set_value('website')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'website') : ""?></span>
        </div>
        <!-- ------------------------------------------------------ -->
        <div class="form-group">
            <label for="caption" class="form-label">bio</label>
            <input type="text" class="form-control" name="bio" id="bio" value="<?= set_value('bio')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'bio') : ""?></span>
        </div>

        <!-- -------------------------------------------------------- -->
        <div class="form-group mt-3">
            <label for="post-img" class="form-label">Upload Profile Picture</label>
            <input type="file" class="form-control" name="postImg" id="postImg">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'postImg') : ""?></span>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary form-control">Update Profile</button>
        </div>



    </form>
</section>