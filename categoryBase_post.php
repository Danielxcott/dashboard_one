<?php require_once "front_panel/head.php"  ?>
<title>Home</title>
<?php require_once "front_panel/side.php"  ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="d-flex my-3">
                <h4 class="mx-3">Your Daily Blogs | </h4>
                <h4 class="text-black-50"> <?php echo category($_GET['category_id'])['title'] ?></h4>
            </div>
            <div>
                <?php
                $id = $_GET['category_id'];
                foreach (fPostsByCate($id) as $key => $value) { ?>
                    <div class="card shadow-sm mb-3 post">
                        <div class="card-body">
                            <a href="detail.php?id=<?php echo $value['id'] ?>" class="text-black text-decoration-none">
                                <h2><?php echo $value['title'] ?></h2>
                            </a>
                            <div class="my-3">
                                <i class="feather-user text-primary"></i>
                                <?php echo user($value['user_id'])['name'] ?>
                                <i class="feather-layers text-info"></i>
                                <?php echo category($value['category_id'])['title'] ?>
                                <i class="feather-calendar"></i>
                                <?php echo showTime($value['created_at'], "j M Y") ?> |
                                <?php echo date("g:i a", strtotime($value['created_at'])) ?>
                            </div>
                            <p class="text-secondary">
                                <?php echo short(strip_tags(html_entity_decode($value['description'])), 200) ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php include "frontSideBar.php" ?>
    </div>
</div>

<?php require_once "front_panel/foot.php"  ?>