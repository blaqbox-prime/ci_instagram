<div class="profile container">
    <section class="profile__header row mb-5">
        <div class="col-4">
            <img src="https://cdn.pixabay.com/photo/2019/04/06/10/17/harley-4107104__340.jpg" alt="harley-avatar" class="avatar-lg rounded-circle"/>
        </div>
        <div class="col-8">
            <div class="row d-flex align-items-center">
                    <h1 class="display-6 col"><?= $username ?> </h1>

                <!-- Edit Profile -->
                <?php if($username == session()->get('loggedUser'))  : ?>
                    <form action="<?= base_url('profile/edit')?>" class="col-3 d-flex">
                        <button class="btn btn-outline-secondary w-100">Edit Profile</button>
                    </form>
                <?php endif ?>
                <!-- Follow -->
                <?php if($username !== session()->get('loggedUser') && !$following)  : ?>
                    <form action="<?= base_url('profile/follow/'.$username)?>" class="col-3 d-flex">
                        <button class="btn btn-primary w-100">Follow</button>
                    </form>
                <?php endif ?>
                <!-- Unfollow --> 
                <?php if($username !== session()->get('loggedUser') && $following) : ?>
                        <form action="<?= base_url('profile/unfollow/'.$username)?>" class="col-3 d-flex">
                        <button class="btn w-100">Unfollow</button>
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
                <p class="text-gray">Personal Blog</p>
                <p class="bio">
                    Evil😈 | Fun🥂 | Food🌮 <br>
                    Ride or die with Mr J 🃏 <br>
                    Arkham Asylum alumni 🩺 <br> 
                    📍 Gotham City
                </p>
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
        <img src="http://localhost:8080/uploads/harleyquinn/87ec52ce-4ca4-48d1-9950-440b19adba25.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2018/08/15/18/28/girl-3608767__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2018/08/15/18/28/girl-3608765__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2019/04/06/10/17/harley-4107104__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2018/08/17/17/09/woman-3613383__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2018/08/15/18/26/girl-3608758__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2017/03/24/22/14/cosplay-2172325__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2019/05/27/14/25/harley-quinn-4232828__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2017/04/13/14/15/mcdonalds-2227657__340.jpg" alt="" class="col">
        <img src="https://cdn.pixabay.com/photo/2015/03/09/10/22/playing-cards-665390__340.jpg" alt="" class="col">
    </section>

</div> 