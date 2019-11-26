<!--get file name-->
<?php $filename = basename(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL), '?' . filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_URL)); ?>

<!--navigation bar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img src="../Asset/website_logo.png" width="100"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?php
                if ($filename === 'index.php') {
                    echo "active";
                }
                ?>" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php
                if ($filename === 'about.php') {
                    echo "active";
                }
                ?>" href="about.php">About</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?php
                if ($filename === 'competition_register.php' || $filename === 'competition_rules.php' || $filename === 'competition_register_chromatic.php' || $filename === 'competition_register_ensemble.php' || $filename === 'competition_register_orchestra.php' || $filename === 'registered_item.php') {
                    echo "active";
                }
                ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Competition
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item <?php
                    if ($filename === 'competition_register.php') {
                        echo "active";
                    }
                    ?>" href="competition_register.php">Register</a>
                    <a class="dropdown-item  <?php
                    if ($filename === 'competition_rules.php') {
                        echo "active";
                    }
                    ?>" href="competition_rules.php">Rules</a>
                    <a class="dropdown-item  <?php
                    if ($filename === 'registered_item.php') {
                        echo "active";
                    }
                    ?>" href="registered_item.php">Registered Item</a>
                </div>
            </li>
            <!-- /Dropdown -->

            <li class="nav-item">
                <a class="nav-link <?php
                if ($filename === 'seminar.php' || $filename === 'seminar_register.php') {
                    echo "active";
                }
                ?>" href="seminar.php">Seminar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php
                if ($filename === 'schedule.php') {
                    echo "active";
                }
                ?>" href="schedule.php">Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php
                if ($filename === 'contact_us.php') {
                    echo "active";
                }
                ?>" href="contact_us.php">Contact Us</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <a class="nav-link p-0" href="cart.php"><img src="../Asset/cart_icon.svg" width="30"></a>
                <?php
                if (isset($_SESSION['uLogin'])) {
                    echo '<a class = "nav-link pr-3" href = "user_profile.php">' . $_SESSION['uName'] . '</a>';
                    echo '<a class = "btn btn-secondary my-2 my-sm-0 px-4" href = "php/logout_query.php">Logout</a>';
                } else {
                    echo '<a class = "nav-link pr-3" href = "log_in.php">Log in</a>';
                    echo '<a class = "btn btn-secondary my-2 my-sm-0 px-4" href = "sign_up.php">Sign up</a>';
                }
                ?>
        </form>                               
    </div>
</nav>

<?php
if (isset($_SESSION['uLogout'])) {
    echo '<div class="msg_box success"><img src="../Asset/correct_icon.svg" width="25" alt="@"><p>Logout successful</p></div>';
    session_destroy();
}
?>
