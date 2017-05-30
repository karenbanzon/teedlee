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
                    <a href="">Profile</a>
                    <a href="">Submissions</a>
                    <a href="" class="active">Sales</a>
                </nav>
                <nav class="account-nav-small hide-for-large">
                    <a href="">Profile</a>
                    <a href="">Submissions</a>
                    <a href="" class="active">Sales</a>
                </nav>
            </div>
            <div class="small-12 large-10 columns end">
                <div class="padding-bottom-20">
                    <div class="table-title-bar clearfix">
                        <div class="small-8 columns">
                            <strong class="title display-block">Designs in store</strong>
                        </div>
                    </div>
                    <table class="unstriped hover stack">
                        <thead>
                            <tr>
                                <th>Design</th>
                                <th>Title</th>
                                <th>SRP</th>
                                <th>Sold</th>
                                <th>Earnings</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="http://unsplash.it/160/120/?random" alt="">
                                </td>
                                <td>
                                    <strong class="display-block">Waterfalls</strong>
                                </td>
                                <td>Php 499.00</td>
                                <td>18</td>
                                <td>Php 8,982.00</td>
                                <td>
                                    <a href="" class="button small secondary hollow">View breakdown</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong class="title">Total</strong></td>
                                <td>Php 8,982.00</td>
                                <td>
                                    <a href="" class="button primary">Remit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>

    </section>

<?php require 'includes/footer.php'; ?>