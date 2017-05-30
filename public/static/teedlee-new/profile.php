<?php require 'includes/header.php'; ?>

    <!-- Main Section -->
    <section class="row">
        <div class="small-12">
            <hr>
            <h6 class="text-center">My account</h6>
            <hr>
        </div>

        <div class="row">
            <div class="small-12 large-2 columns">
                <nav class="account-nav show-for-large">
                    <a href="" class="active">Profile</a>
                    <a href="">Submissions</a>
                    <a href="">Sales</a>
                </nav>
                <nav class="account-nav-small hide-for-large">
                    <a href="" class="active">Profile</a>
                    <a href="">Submissions</a>
                    <a href="">Sales</a>
                </nav>
            </div>
            <div class="small-12 large-8 columns end">
                <div class="clearfix padding-bottom-20">
                    <div class="small-4 columns text-right padding-top-10">
                        <h6 class="text-alt">Photo</h6>
                    </div>
                    <div class="small-8 columns">
                        <img src="http://unsplash.it/150/150/?random" alt="" class="img-circle margin-10">
                        <label for="uploadImage" class="button small secondary"><span class="icon icon-cloud-upload"></span> Upload Image</label>
                        <input type="file" id="uploadImage" class="show-for-sr">
                    </div>
                </div>
                <div class="clearfix padding-bottom-20">
                    <div class="small-4 columns text-right padding-top-10">
                        <h6 class="text-alt">Alias</h6>
                    </div>
                    <div class="small-8 columns">
                        <input type="text" placeholder="Enter alias" value="Juan Jose">
                    </div>
                </div>
                <div class="clearfix padding-bottom-20">
                    <div class="small-4 columns text-right padding-top-10">
                        <h6 class="text-alt">Username</h6>
                    </div>
                    <div class="small-8 columns">
                        <input type="text" placeholder="Enter username" value="juanjose">
                        <small class="text-red">Username is already taken</small>
                    </div>
                </div>
                <div class="clearfix padding-bottom-20">
                    <div class="small-4 columns text-right padding-top-10">
                        <h6 class="text-alt">Website</h6>
                    </div>
                    <div class="small-8 columns">
                        <input type="text" placeholder="http://" value="http://www.juanjose.com">
                    </div>
                </div>
                <div class="clearfix padding-bottom-20">
                    <div class="small-4 columns text-right padding-top-10">
                        <h6 class="text-alt">About me</h6>
                    </div>
                    <div class="small-8 columns">
                        <textarea rows="4" placeholder="Tell us about yourself">Williamsburg gluten-free celiac, tilde tacos four loko irony. YOLO fam ugh, pabst letterpress freegan celiac biodiesel semiotics paleo franzen godard marfa pok pok typewriter. Copper mug bitters snackwave, kinfolk prism lo-fi vinyl four loko sriracha edison bulb waistcoat.</textarea>
                        <small class="text-ash">300 characters left</small>
                        <small class="text-orange">10 characters left</small>
                        <small class="text-red">0 characters left</small>
                    </div>
                </div>
                <div class="clearfix padding-bottom-20">
                    <div class="small-4 columns text-right padding-top-10">
                        <h6 class="text-alt">Profile url</h6>
                    </div>
                    <div class="small-8 columns">
                        <p class="padding-top-10"><a href="">http://teedlee.ph/artist/juanjose</a></p>
                    </div>
                </div>
                <div class="clearfix padding-bottom-20">
                    <div class="small-8 small-offset-4 columns">
                        <a href="" class="button primary">Save changes</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php require 'includes/footer.php'; ?>