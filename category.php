<?php
    include_once('./includes/header.php');
    
    if(!isset($_GET['page'])){
        $page = 1;
    } else{
        $page = $_GET['page'];
    }

    $newsData->set('category_id',$_GET['cat_id']);
    $newsList = $newsData->getNewsByCategoryIDForPagination($page);
    $totalNews = $newsData->countNewsByCategoryID();

?>

<div class="container">
    <div class="archive-news">
        

        <?php  foreach ($newsList as $item) { ?>

            <div class="feature-news-content" style="margin: 30px 0;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="feature-news-content-thumbnail">
                            <img src="./admin/images/<?php echo $item->feature_image; ?>" width="100%">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <a href="news.php?news_slug=<?php echo $item->slug; ?>">
                            <h4><?php echo $item->name; ?></h4>
                        </a>
                        <p><?php echo htmlspecialchars_decode($item->short_discription); ?></p>
                        <span>Author : <?php echo $item->created_by; ?></span> |
                        </span><?php echo date_format(date_create($item->created_at),"d M, Y") ?></span>
                        <br>
                        <br>
                        <a href="news.php?news_slug=<?php echo $item->slug; ?>" class="btn btn-success">Read More</a>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="news-pagination" style="margin-bottom: 50px">
            
            <?php if($totalNews > 0) { ?>


                <!-- Previous page -->
                <?php if($page > 1){ ?>

                    <a href="category.php?cat_id=<?php echo $_GET['cat_id']; ?>&page=<?php echo $page - 1; ?>" class="btn btn-success">
                        < Prev
                    </a>

                <?php } else{ ?>

                    <button class="btn btn-danger" disabled>< Prev </button>

                <?php } ?>

                <!-- Pagination loog -->
                <?php for ($i=0; $i < $totalNews/CATEGORY_NEWS_COUNT; $i++) {  ?>

                    <a href="category.php?cat_id=<?php echo $_GET['cat_id']; ?>&page=<?php echo $i+1; ?>" class="btn btn-primary"><?php echo $i+1; ?></a>

                <?php } ?>


                <!-- Next Page -->
                <?php if( ($totalNews/CATEGORY_NEWS_COUNT) > $page ){ ?>

                     <a href="category.php?cat_id=<?php echo $_GET['cat_id']; ?>&page=<?php echo $page + 1; ?>" class="btn btn-success">
                        Next >
                    </a>

                <?php } else{ ?>

                    <button class="btn btn-danger" disabled>Next > </button>

                <?php } ?>



            <?php }?>
            

        </div>
       
    </div>
</div>

<?php include_once('./includes/footer.php'); ?>