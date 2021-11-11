<div class="profile container">
    <section class="profile__header row mb-5">
    
    <?php if($picture !== null) :?>
    <div class="col-md-4 col-12 d-flex">
            <img src="<?= $picture?>" alt="harley-avatar" class="avatar-lg rounded-circle"/>
        </div>
    <?php else : ?>
        <div class="col-md-4 col-12 d-flex">
            <img src="https://www.freepnglogos.com/uploads/logo-ig-png/logo-ig-instagram-png-transparent-instagram-images-pluspng-3.png" alt="harley-avatar" class="avatar-lg rounded-circle"/>
        </div>
    <?php endif ?>
    
    <div class="col-md-8 col-12">
            <div class="row d-flex align-items-center">
                    <h1 class="display-6 col-12 col-sm"><?= $username ?> </h1>

                <!-- Edit Profile -->
                <?php if($username == session()->get('loggedUser'))  : ?>
                    <form action="<?= base_url('profile/edit')?>" class="col-12 col-sm-9 d-flex">
                        <button class="btn btn-outline-secondary w-100">Edit Profile</button>
                    </form>
                <?php endif ?>
                <!-- Follow -->
                <?php if($username !== session()->get('loggedUser') && !$following && session()->has('loggedUser'))  : ?>
                    <form action="<?= base_url('profile/follow/'.$username)?>" class="col-12 col-sm-9 d-flex">
                        <button class="btn btn-primary w-100">Follow</button>
                    </form>
                <?php endif ?>
                <!-- Unfollow --> 
                <?php if($username !== session()->get('loggedUser') && $following && session()->has('loggedUser')) : ?>
                        <form action="<?= base_url('profile/unfollow/'.$username)?>" class="col-sm-3 col-12 d-flex">
                        <button class="btn btn-outline-secondary w-100">Unfollow</button>
                    </form>
                <?php endif ?>    
                <!-- Dont Show -->
            </div>
            <div class="d-flex user-engagements mt-4 mb-3">
                <p class="me-5"><strong>35</strong> posts</p>
                <p class="me-5"><strong>2,358</strong> followers</p>
                <p class=""><strong>1,786</strong> following</p>
            </div>
            <div class="user-info">
                <p><strong><?= $name?></strong></p>

                <!-- Category -->
                <?php if($category !== null) : ?>
                <p class="text-gray"><?= $category ?></p>
                <?php endif ?>
                <!-- Bio -->
                <?php if($bio !== null) :?>
                <p class="bio">

                    <?= $bio?>

                    <!-- Evil😈 | Fun🥂 | Food🌮 <br>
                    Ride or die with Mr J 🃏 <br>
                    Arkham Asylum alumni 🩺 <br> 
                    📍 Gotham City -->
                </p>
                <?php endif ?>
                <!-- website -->
                <?php if($website !== null) : ?>
                    <a style="display: block; text-decoration: none;" class=""href="<?= $website?>" target="_blank"><?= $website ?></a>
                <?php endif ?> 
                <small class="followedby text-gray">
                    Followed by 
                    <strong>catwoman, batman, joker, ivytheplantqueen</strong> 
                    + 25 more
                </small>
            </div>
        </div>
    </section>

    <hr>

    <section class="user-photos row row-cols-1 row-cols-sm-2 row-cols-md-3 mt-5">

    <?php foreach ($posts as $post) :?>
        <img src="<?= $post['image']?>" alt="" class="col">
    <?php endforeach ?>

    </section>

</div> 