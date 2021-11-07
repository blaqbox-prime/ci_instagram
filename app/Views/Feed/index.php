<main class="Feed container">
    <div class="row">
        <!-- Main feed column -->
    <div class="col-8">
        <!-- Stories -->
        <div class="stories border bg-white">
            <img src="https://cdn.pixabay.com/photo/2016/06/11/12/13/pink-hair-1450045__340.jpg" alt="" class="avatar rounded-circle m-3">
            <img src="https://cdn.pixabay.com/photo/2012/06/19/10/32/owl-50267__340.jpg" alt="" class="avatar rounded-circle m-3">
            <img src="https://cdn.pixabay.com/photo/2015/06/22/08/40/child-817373__340.jpg" alt="" class="avatar rounded-circle m-3">
            <img src="https://cdn.pixabay.com/photo/2015/06/08/15/02/pug-801826__340.jpg" alt="" class="avatar rounded-circle m-3">
            <img src="https://cdn.pixabay.com/photo/2017/05/13/12/40/fashion-2309519__340.jpg" alt="" class="avatar rounded-circle m-3">
            <img src="https://cdn.pixabay.com/photo/2018/01/06/09/25/hijab-3064633__340.jpg" alt="" class="avatar rounded-circle m-3">
            <img src="https://cdn.pixabay.com/photo/2018/07/21/03/55/woman-3551832__340.jpg" alt="" class="avatar rounded-circle m-3">
            <img src="https://cdn.pixabay.com/photo/2018/03/12/12/32/woman-3219507__340.jpg" alt="" class="avatar rounded-circle m-3">
        </div>
        <!-- Posts -->
        <div class="posts bg-light">
            <div class="post card my-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <img src="https://cdn.pixabay.com/photo/2015/11/18/07/14/fashion-1048725__340.jpg" alt="" class="avatar-sm rounded-circle ">
                        <p class="post__username ms-4">catwoman</p>
                    </div>
                </div>
                <div class="card-body" style="padding: 0px">
                    <img src="https://cdn.pixabay.com/photo/2018/06/30/18/37/panda-3508116_960_720.jpg" class="post__image" alt="">
                    <div class="post__icons">
                        <img src="<?= base_url("icons/heart-outline.png") ?>" alt="" class="icon">
                        <img src="<?= base_url("icons/comment.png") ?>" alt="" class="icon">
                        <img src="<?= base_url("icons/send.png") ?>" alt="" class="icon">
                    </div>
                    <div class="post__content">
                        <p class="likes mb-1"><strong>1,878 likes</strong></p>
                        <p class="descr">
                            <strong>selenakyle</strong> Cat woman and gotham arkham asylum stuff here
                            <span class="hashtag">#catwoman #birdsofprey #brucesucks #batman #harlylover</span>
                        </p>
                        <p class="text-gray mb-1">View all 22 comments</p>
                        <p class="comment"><strong>harleyQuinn</strong> aww cute 😀</p>
                        <p class="comment"><strong>ivythequeen</strong> natures quite beautiful isn't it ❤</p>
                        <p class="post__date"><small>13 HOURS AGO</small></p>
                    </div>
                </div>
                <div class="card-footer">
                    <form class="comment__input d-flex" autocomplete="off" >
                        <input type="text" class="form-control-plaintext" id="comment" name="comment" placeholder="Add a comment">
                        <button type="submit" class="btn btn-light">Post</button>
                    </form>
                </div>
            </div>
            <!-- END OF POST -->
            <div class="post card my-4">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <img src="https://cdn.pixabay.com/photo/2015/11/18/07/14/fashion-1048725__340.jpg" alt="" class="avatar-sm rounded-circle ">
                        <p class="post__username ms-4">catwoman</p>
                    </div>
                </div>
                <div class="card-body" style="padding: 0px">
                    <img src="https://cdn.pixabay.com/photo/2018/06/30/18/37/panda-3508116_960_720.jpg" class="post__image" alt="">
                    <div class="post__icons">
                        <img src="<?= base_url("icons/heart-outline.png") ?>" alt="" class="icon">
                        <img src="<?= base_url("icons/comment.png") ?>" alt="" class="icon">
                        <img src="<?= base_url("icons/send.png") ?>" alt="" class="icon">
                    </div>
                    <div class="post__content">
                        <p class="likes mb-1"><strong>1,878 likes</strong></p>
                        <p class="descr">
                            <strong>selenakyle</strong> Cat woman and gotham arkham asylum stuff here
                            <span class="hashtag">#catwoman #birdsofprey #brucesucks #batman #harlylover</span>
                        </p>
                        <p class="text-gray mb-1">View all 22 comments</p>
                        <p class="comment"><strong>harleyQuinn</strong> aww cute 😀</p>
                        <p class="comment"><strong>ivythequeen</strong> natures quite beautiful isn't it ❤</p>
                        <p class="post__date"><small>13 HOURS AGO</small></p>
                    </div>
                </div>
                <div class="card-footer">
                    <form class="comment__input d-flex" autocomplete="off" >
                        <input type="text" class="form-control-plaintext" id="comment" name="comment" placeholder="Add a comment">
                        <button type="submit" class="btn btn-light">Post</button>
                    </form>
                </div>
            </div>
            <!-- END OF POST -->
        </div>
    </div>
        <!-- Side content -->
    <aside class="col-4">
        <h1>Side Column</h1>
    </aside>
    </div>
</main>