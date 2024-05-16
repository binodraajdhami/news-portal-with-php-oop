
<?php

    $title = 'Create Category';
    require_once "includes/header.php";
    require_once "class/category.class.php";

    $category = new Category();

    if(isset($_POST['btnCreateCategory'])){

        $error = [];

        if(isset($_POST['name']) && !empty($_POST['name'])){
            $category->set('name',$_POST['name']);
        } else{
            $error['name'] = '<p style="color:red">Name is required!</p>';
        }
        if(isset($_POST['rank']) && !empty($_POST['rank'])){
            $category->set('rank',$_POST['rank']);
        } else{
            $error['rank'] = '<p style="color:red">Rank is required!</p>';
        }
        $category->set('status',$_POST['status']);
        $category->set('created_by', $_SESSION['username']);
        $category->set('created_at', date('Y-m-d H:i:s'));

        if(count($error) == 0){
            $resultStatus = $category->save();
        }
    }

?>

<div id="page-wrapper">

    <!-- Page Title -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category Management</h1>
        </div>
    </div>

    <!-- Page Sub Title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $title; ?></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form  method="post" action="">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                    <?php if(isset($error['name'])){ echo $error['name']; } ?>
                                </div>
                                <div class="form-group">
                                    <label>Rank</label>
                                    <input type="number" name="rank" class="form-control">
                                    <?php if(isset($error['rank'])){ echo $error['rank']; } ?>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="0" checked>De-active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="1">Active
                                        </label>
                                    </div>
                                </div>
                                
                                <button type="submit" name="btnCreateCategory" class="btn btn-success">Create Category</button>
                            </form>
                            <?php if(isset( $resultStatus)){ echo $resultStatus ; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    
<?php require_once "includes/footer.php" ?>