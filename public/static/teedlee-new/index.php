<?php require 'includes/header.php'; ?>

    <!-- Main Section -->
    <section class="expanded row padding-10">

        <div class="small-12 large-8 large-offset-2 padding-10">
            <h1>Teedlee v2.0</h1>
            <hr>
            <h4>Stickersheet</h4>
            <ul>
                <li><a href="stickersheet.php">Stickersheet</a></li>
            </ul>
            <hr>
            <h4>Static Pages</h4>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="welcome.php">Welcome</a></li>
                <li>My Account
                    <ul>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="submissions.php">Submissions</a></li>
                        <li><a href="submissions-empty.php">Submissions (empty)</a></li>
                        <li><a href="sales-overview.php">Sales (overview)</a></li>
                        <li><a href="sales-breakdown.php">Sales (breakdown)</a></li>
                        <li><a href="sales-empty.php">Sales (empty)</a></li>
                    </ul>
                </li>
                <li>Public
                    <ul>
                        <li><a href="user-page.php">User page</a></li>
                        <li><a href="vote-landing.php">Vote (landing)</a></li>
                        <li><a href="submit-landing.php">Submit (landing)</a></li>
                        <li><a href="vote-end-empty-open-submission.php">Vote (all open submission entries have been voted on)</a></li>
                        <li><a href="vote-end-empty-contest.php">Vote (all contest entries have been voted on)</a></li>
                    </ul>
                </li>
                <li>Contests
                    <ul>
                        <li><a href="contest-single-landing-submission-open.php">Single - Submission Open, Voting Ongoing</a></li>
                        <li><a href="contest-single-landing-voting-ongoing.php">Single - Submission Closed, Voting Ongoing</a></li>
                        <li><a href="contest-single-landing-contest-closed-awaiting-winners.php">Single - Contest Closed, Awaiting winners</a></li>
                        <li><a href="contest-single-landing-contest-closed-show-winners.php">Single - Contest Closed, Winners Announced</a></li>
                        
                    </ul>
                </li>
            </ul>
        </div>


    </section>

<?php require 'includes/footer.php'; ?>