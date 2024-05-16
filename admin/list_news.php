<?php
    $title = 'List News';
    require_once "includes/header.php";
    require_once "class/news.class.php";

    $new = new News();
    $news = $new->retrive();
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
            <h1 class="page-header">Category Management</h1>
            <h4></h4>
        </div>
    </div>

     <!-- Page Sub Title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $title; ?></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="list_category">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Short Description</th>
                                    <th>Feature Key</th>
                                    <th>Feature Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 0;
                                    foreach($news as $item) { $count++; ?> 
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $item->name; ?></td>
                                        <td><?php echo $item->short_discription; ?></td>
                                        <td><?php if($item->feature_key == 1){ echo "Yes"; } else { echo "No"; } ?></td>
                                        <td style="width: 150px;">
                                            <img src="./images/<?php echo $item->feature_image; ?>" class="img-responsive">
                                        </td>
                                        <td><?php if($item->status == 1){ echo "Active"; } else { echo "De-active"; } ?></td>
                                        <td style="width: 190px;">
                                            <a href="view_news.php?slug=<?php echo $item->slug; ?>" class="btn btn-primary">View</a>
                                            <a href="edit_news.php?id=<?php echo $item->id; ?>" class="btn btn-success">Edit</a>
                                            <a href="delete_news.php?id=<?php echo $item->id; ?>" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require_once "includes/footer.php" ?>