<!DOCTYPE html>
<html>
<head>
    <title>Tunning and tatoo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo WEBROOT . "articles/index/"; ?>">Tunning and Tatoo</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
        <?php

            if (isset($_SESSION["email"]))
            {
                require_once(ROOT . 'Models/User.php');
                $user = new User();
                $id = $user->getIdFromEmail($_SESSION["email"]);
                $group = $user->getGroup($id);
            }
            else
            {
                $group = 0;
            }
            if ($group > 0) {
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo WEBROOT . "articles/index/"; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo WEBROOT . "users/account/" . $id; ?>">My Account</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Articles Management
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo WEBROOT . "articles/create"; ?>">Create an article</a>
                        <a class="dropdown-item" href="<?php echo WEBROOT . "articles/management/"; ?>">Manage
                            articles</a>
                    </div>
                </li>
                <?php
                    if($group == 3)
                    {
                ?>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo WEBROOT . "users/management/" . $id; ?>">Users Management</a>
                        </li>
                <?php
                    }
                }
                ?>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION["email"])) {
                        ?>
                        <a class="nav-link" href="<?php echo WEBROOT . "users/logout/"; ?>">Logout</a>
                        <?php
                    } else {
                        ?>
                        <a class="nav-link" href="<?php echo WEBROOT . "users/login/"; ?>">Login</a>
                        <?php
                    }
                    ?>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
    </div>
</nav>

<?php
    echo $content_for_layout;
?>

<footer>Un blog fait par amour à Lille.</footer>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>