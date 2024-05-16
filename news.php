<?php
    include_once('./includes/header.php');
    $newsData->set('slug',$_GET['news_slug']);
    $singeNews = $newsData->getNewsBySlug();
    $relatedNews = $newsData->getNewsByCategoryID($singeNews->category_id);

    $comment->set('news_id',$singeNews->id);

    if(isset($_POST['submit'])){
        
        $comment->set('comment_text',$_POST['comment']);
        $comment->set('created_by',$_SESSION['username']);
        $comment->set('created_at',date('Y-m-d H:i:s'));

        $result = $comment->save();
    }

    $comment_lints = $comment->get_comment_by_news();

?>


<div class="container">
    <div class="sigle-news">
        <div class="row">
            <div class="col-sm-8">
                <div class="feature-news-content">
                    <div class="feature-news-content-thumbnail">
                        <img src="./admin/images/<?php echo $singeNews->feature_image; ?>" width="100%">
                    </div>
                    <h4><?php echo $singeNews->name; ?></h4>
                    <span>By: <?php echo $singeNews->created_by; ?></span> |
                    <span><?php echo date_format(date_create($singeNews->created_at),"d M, Y"); ?></span>

                    <p><?php echo htmlspecialchars_decode($singeNews->long_description); ?></p>
                </div>

                <hr>
                
                <div class="comment-list">
                    <ul>

                    <?php foreach($comment_lints as $item){ ?>

                        <li style="margin-bottom:15px;">

                            <?php
                                if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
                                
                                if($item->created_by == $_SESSION['username']){ ?>

                            <a href="delete_comment.php?commment_id=<?php echo $item->id; ?>&return_link=<?php echo $_GET['news_slug']; ?>" class="btn btn-danger" style="float: right;" onclick="return myDeleteFunction()">Delete</a>

                            <?php }
                            } ?>

                            <h4><?php echo $item->created_by; ?></h4>
                            <span><?php echo date_format(date_create($item->created_at),"d M, Y") ?></span>
                            <p><?php echo $item->comment_text; ?></p>
                        </li>

                    <?php } ?>

                    </ul>
                </div>

                <hr>
                <div class="commment" style="margin: 30px 0 50px;">
                    
                    <?php

                    @session_start();

                    if(isset($_SESSION['username'])){ ?>

                         <form method="post">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control" style="margin: 15px 0;"></textarea>
                            <button name="submit" class="btn btn-success">Submit</button>
                        </form>

                    <?php } else { ?>

                        <a href="login.php" class="btn btn-lg btn-primary">Write Comment</a>

                    <?php } ?>

                </div>
            </div>
            <div class="col-sm-4">
            <h4>Related News</h4>
                <?php foreach ($relatedNews as $item) { ?>

                    <?php if($item->id != $singeNews->id) { ?>
                    <a href="news.php?news_slug=<?php echo htmlspecialchars_decode($item->slug); ?>">
                        <h4><?php echo htmlspecialchars_decode( $item->name); ?></h4>
                    </a>

                <?php }
                    if(count($relatedNews) == 1 ){
                        echo "No date found";
                    }
                }?>
            </div>
        </div>
    </div>
</div>

<script>
    function myDeleteFunction(){
        var sureConfirm = confirm('Are you sure want to delete?');
        if(sureConfirm){
            return true;
        } else{
            return false;
        }
    }
</script>

<?php include_once('./includes/footer.php'); ?>