
<?php

    $title = 'Create News';
    require_once "includes/header.php";
    require_once "class/category.class.php";
    require_once "class/news.class.php";

    $category = new Category();
    $categories =  $category->retrive();

    $news = new News();

    // echo "<pre>";
    // print_r($messageArray);
    // echo "</pre>";

    if(isset($_POST['btnCreateNews'])){

        $error = [];
        
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $news->set('name',$_POST['name']);
        } else{
            $error['name'] = "<p class='error'>Name is required</p>";
        }

        $news->set('slug',strtolower(join("-",explode(' ',$_POST['name']))));
        $news->set('category_id',$_POST['category_id']);
        $news->set('long_description',$_POST['long_description']);
        $news->set('short_discription',$_POST['short_discription']);
        $news->set('feature_key',$_POST['feature_key']);

        if(isset($_FILES['feature_image']) && $_FILES['feature_image']['error'] == 0){

            $new_image_name = uniqid().'_'.$_FILES['feature_image']['name'];

            if(move_uploaded_file($_FILES['feature_image']['tmp_name'], 'images/'.$new_image_name)){
                $news->set('feature_image',$new_image_name);
            }
        } else{
            $error['image'] = "<p class='error'>Image is required</p>";
        }

        $news->set('status',$_POST['status']);
        $news->set('created_by',$_SESSION['username']);
        $news->set('created_at',date('Y-m-d H:i:s'));

        // if(count($error) == 0){
        //      $resultStatus = $news->save();
        // }

        $resultStatus = $news->save();

        if($resultStatus){
            $resultStatus = "Created News Succeful!";
        } else{
            $resultStatus = "Already Exist!";
        }

        // echo "<pre>";
        // print_r($_FILES);
        // print_r($news);
        // echo "</pre>";
    }
?>

<div id="page-wrapper">

    <!-- Page Title -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News Management</h1>
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
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category Name</option>
                                        <?php foreach ($categories as $item) { ?>
                                            <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Short Discription</label>
                                    <input type="text" name="short_discription" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Long Description</label>
                                    <textarea name="long_description" id="editor" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Feature Key</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="feature_key" value="0" checked>De-active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="feature_key" value="1">Active
                                        </label>
                                    </div>
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

                                <div class="form-group">
                                    <label>Feature Image</label>
                                    <input type="file" name="feature_image">

                                    <?php if(isset($error['image'])){ echo $error['image']; } ?>
                                </div>
                                
                                <button type="submit" name="btnCreateNews" class="btn btn-success">Create News</button>
                            </form>
                            <?php if(isset( $resultStatus)){ echo $resultStatus ; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
    
<?php require_once "includes/footer.php"; ?>