<?php
    include_once('./includes/header.php');

    if(isset($_POST['search_btn'])){

        if(isset($_POST['keywords']) && !empty($_POST['keywords'])){
            $search_list = $newsData->search_news($_POST['keywords']);
        }
        
    } else{
        header('location:index.php');
    }
?>

<div class="container">
    <div class="archive-news">
        <div class="row">

        <?php
            if(isset($search_list)){


            if(count($search_list) > 0){

                foreach ($search_list as $item) { ?>

                    <div class="col-sm-4">
                        <div class="feature-news-content">
                            <div class="feature-news-content-thumbnail">
                                <img src="./admin/images/<?php echo $item->feature_image; ?>" width="100%">
                            </div>
                            <a href="news.php?news_slug=<?php echo $item->slug; ?>">
                                <h4><?php echo $item->name; ?></h4>
                            </a>
                            <span>By: <?php echo $item->created_by; ?></span> |
                            <span><?php echo date_format(date_create($item->created_at),"d M, Y"); ?></span>
                        </div>
                    </div>

                <?php }

            } else{ ?>

            <blockquote>
                <p>No data found to your query...</p>
            </blockquote>

            <?php } 

            }?>
        
       </div>
    </div>
</div>

<?php include_once('./includes/footer.php'); ?>