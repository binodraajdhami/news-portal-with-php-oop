<?php
	
	define('ADMIN_FOLDER', 'admin');
	require_once ADMIN_FOLDER."/class/news.class.php";
	$newsData = new News();


	$keywords = $_POST['keywords'];
	$search_list = $newsData->search_news(trim($keywords));

	$datas = "";
	if(count($search_list) > 0){

		foreach ($search_list as $item){
			$datas.="
				<div class='col-sm-4'>
					<div class='feature-news-content'>
						<div class='feature-news-content-thumbnail'>
							<img src='./admin/images/".$item->feature_image."' width='100%'>
						</div>
                    	<a href='news.php?news_slug=".$item->slug."'><h4>".$item->name."</h4></a>
                    	<span>By: ".$item->created_by."</span> |
                    	</span>".date_format(date_create($item->created_at),'d M, Y')."</span>
                    	<p>".htmlspecialchars_decode($item->long_description)."</p>
                    </div>
                </div>
            ";
		}
		echo $datas;

	} else{
		echo "No data found to your query.";
	}
?>