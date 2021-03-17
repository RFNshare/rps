<?php
session_start();
error_reporting(0);
require_once "pdo.php";
$message = "";
if (!isset($_SESSION['email'])) {
    echo '<h2 style="text-align: center; color: darkred">Unauthorized access</h2><br>
         <a href="login.php" style="color: green; text-align: center">Please Log In</a>';
    die();

}
?>
<html>
<head>
    <?php require "require/require.html"; ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abdullah Al Faroque 4dd5d7f0</title>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button"
     style="height:80px;background-color:#37434d;color:#ffffff;">
    <div class="container-fluid"><a class="navbar-brand" href="#"><i class="fa fa-globe"></i> Abdullah Al Faroque</a>
        <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link active" style="color:#ffffff;" href="#"><i
                                class="fa fa-home"></i> Home</a></li>
                <li class="nav-item"><a class="nav-link" style="color:#ffffff;" href="#"><i
                                class="fa fa-wpexplorer"></i> Explore</a></li>
                <li class="nav-item"><a class="nav-link" style="color:#ffffff;" href="#"><i class="fa fa-star-o"></i> Features</a>
                </li>
                <li class="nav-item"><a class="nav-link" style="color:#ffffff;" href="#"><i
                                class="fa fa-user-circle-o"></i> Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" style="color:#ffffff;" href="index.php"><i
                                class="fa fa-sign-in"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h1 style="text-align: center;"><br/>Welcome  <?= $_SESSION['email'] ?><br/></h1>
    <h3 style="text-align: center;"><br/>Your session id is  <?php echo(session_id()); ?><br/></h3>

    <p style="color: green;"><?= $_GET['message'] ?></p>
    <p style="color: red;"><?= $_GET['fail_message'] ?></p>
    <form method="post" action="autos_submit.php">
        <label for="make">Make:</label>
        <input type="text" name="make" id="make" size="50" value= <?= htmlentities() ?>><br/><br/>
        <label for="year">Year:</label>
        <input type="text" name="year" id="year"><br/><br/>
        <label for="mileage">Mileage:</label>
        <input type="text" name="mileage" id="mileage"><br/><br/>
        <input type="submit" value="Add">
        <input type="submit" name="logout" value="Logout">
        <!--        <button><a href="logout.php">LogOut</a></button>-->
        <input type="hidden" value="<?= $_GET['name'] ?>" name="asd">
    </form>
    <h1 style="text-align: center">Automobiles</h1>
    <h1>
        Tracking Autos List
    </h1>
    <p>A simple example of how-to put a bordered table within a panel. Responsive, place holders in header/footer for
        buttons or pagination.</p>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title">Panel Heading</h3>
                    </div>
                    <div class="col col-xs-6 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                data-whatever="@mdo">Add Autos
                        </button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <table class="table table-striped table-bordered table-list">
            <thead>
            <tr>
                <th class="hidden-xs">ID</th>
                <th>Make</th>
                <th>Year</th>
                <th>Mileage</th>
                <th><em class="fa fa-cog"></em>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stmt = $pdo->query('SELECT * FROM autos');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td class="hidden-xs"><?= htmlentities($row['auto_id']) ?></td>
                    <td><?= htmlentities($row['make']) ?></td>
                    <td><?= htmlentities($row['year']) ?></td>
                    <td><?= htmlentities($row['mileage']) ?></td>
                    <td align="center">
                        <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                        <a href="delete.php?auto_id=<?= $row['auto_id'] ?>" class="btn btn-danger"><em
                                    class="fa fa-trash"></em></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<!--    Pagination-->
    <div class="panel-footer">
        <div class="row">
            <div class="col col-xs-4">Page 1 of 5
            </div>
            <div class="col col-xs-8">
                <ul class="pagination hidden-xs pull-right">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
                <ul class="pagination visible-xs pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
