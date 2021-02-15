<?php

    include('config/db_connect.php');

    //write query for parts
    $sql = 'SELECT title, parts, id FROM builds ORDER BY created_at';

    //make query and get results
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $builds = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

    //print_r($builds);

    //print_r(explode(',', $builds['0']['parts']));
?>

<!DOCTYPE html>
<html lang="en">

<?php include ('templates/header.php') ?>

<h4 class="center">builds</h4>
<div class="container">
    <div class="row">
        <?php foreach($builds as $build): ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($build['title']); ?></h6>
                        <div>
                        <ul>
                            <?php foreach(explode(',',$build['parts']) as $pt): ?>
                                <li><?php echo htmlspecialchars($pt); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        </div>
                    </div>
                    <div class = "card-action right-align">
                    <a href="#" class="brand">More Info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php include ('templates/footer.php') ?>
    

</html>