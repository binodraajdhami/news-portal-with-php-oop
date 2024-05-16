<?php
    $title = 'List Category';
    require_once "includes/header.php";
    require_once "class/category.class.php";

    $category = new Category();

    $datas = $category->retrive();

?>

<div id="page-wrapper">

    <!-- Page Title -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category Management</h1>
            <h4></h4>
        </div>
    </div>

     <!-- Page Sub Title -->
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
                                    <th>Rank</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    if(count($datas) != 0){
                                        $count = 0;
                                        foreach ($datas as $item) { $count++; ?>
                                            
                                            <tr class="odd gradeX">
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $item->name; ?></td>
                                               <td><?php echo $item->rank; ?></td>
                                                <td>
                                                    <?php
                                                        if($item->status == 1){
                                                            echo 'Active';
                                                        } else{
                                                            echo 'De-active';
                                                        }
                                                    ?>

                                                </td>
                                                <td>
                                                    <a href="edit_category.php?id=<?php echo $item->id; ?>" class="btn btn-success">Edit</a>
                                                    <a href="delete_category.php?id=<?php echo $item->id; ?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>

                                        <?php }

                                    } else{
                                        echo 'No data found.';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require_once "includes/footer.php" ?>