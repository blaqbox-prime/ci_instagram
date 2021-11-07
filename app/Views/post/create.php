<section class="container">
    <h1 class="display-1"><?= $title ?></h1>
    <form action="<?= base_url($username.'/post/save') ?>" method="post"  enctype="multipart/form-data">
        <?= csrf_field()?>
        <div class="form-group">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" class="form-control" name="caption" id="caption" value="<?= set_value('caption')?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'caption') : ""?></span>

        </div>

        <div class="form-group mt-3">
            <label for="post-img" class="form-label">Upload image</label>
            <input type="file" class="form-control" name="postImg" id="postImg">
            <span class="text-danger"><?= isset($validation) ? display_error($validation,'postImg') : ""?></span>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary form-control">Create Post</button>
        </div>



    </form>
</section>