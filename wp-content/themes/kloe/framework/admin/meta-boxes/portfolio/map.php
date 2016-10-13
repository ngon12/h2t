<?php

$qode_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$qode_pages[$page->ID] = $page->post_title;
}

global $kloe_qodef_IconCollections;

//Portfolio Images

$qodePortfolioImages = new KloeQodefMetaBox("portfolio-item", "Portfolio Images (multiple upload)", '', '', 'portfolio_images');
$kloe_qodef_Framework->qodeMetaBoxes->addMetaBox("portfolio_images",$qodePortfolioImages);

	$qode_portfolio_image_gallery = new KloeQodefMultipleImages("qode_portfolio-image-gallery","Portfolio Images","Choose your portfolio images");
	$qodePortfolioImages->addChild("qode_portfolio-image-gallery",$qode_portfolio_image_gallery);

//Portfolio Images/Videos 2

$qodePortfolioImagesVideos2 = new KloeQodefMetaBox("portfolio-item", "Portfolio Images/Videos (single upload)");
$kloe_qodef_Framework->qodeMetaBoxes->addMetaBox("portfolio_images_videos2",$qodePortfolioImagesVideos2);

	$qode_portfolio_images_videos2 = new KloeQodefImagesVideosFramework("Portfolio Images/Videos 2","ThisIsDescription");
	$qodePortfolioImagesVideos2->addChild("qode_portfolio_images_videos2",$qode_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$qodeAdditionalSidebarItems = new KloeQodefMetaBox("portfolio-item", "Additional Portfolio Sidebar Items");
$kloe_qodef_Framework->qodeMetaBoxes->addMetaBox("portfolio_properties",$qodeAdditionalSidebarItems);

	$qode_portfolio_properties = new KloeQodefOptionsFramework("Portfolio Properties","ThisIsDescription");
	$qodeAdditionalSidebarItems->addChild("qode_portfolio_properties",$qode_portfolio_properties);

