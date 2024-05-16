<?php
    $title = 'View News';
    require_once "includes/header.php";
    require_once "class/news.class.php";

    $news = new News();
    $news->set('slug', $_GET['slug']);
    $data = $news->getNewsById();

?>

<script>
    function confirmDelete() {
        var sure = confirm('Are you sure want to delete?');
        if (sure) {
            return true;
        } else{
            return false;
        }
    }
</script>

<div id="page-wrapper">

    <!-- Page Title -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News Management</h1>
            <h4></h4>
        </div>
    </div>

     <!-- Page Sub Title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $title; ?></div>
                <div class="panel-body">
                    <h1><?php echo $data->name; ?></h1>
                    <h4><?php echo $data->short_discription; ?></h4>
                    <p><?php echo htmlspecialchars_decode($data->long_description); ?></p>
                    <h1></h1>
                    <img src="./images/<?php echo $data->feature_image; ?>" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require_once "includes/footer.php" ?>