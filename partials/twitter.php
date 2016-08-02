<?php
  $tweets = getTweets(1, 'TattonIM', array("exclude_replies" => true));
  //var_dump($tweets);
  foreach($tweets as $tweet):
  	//var_dump($tweet['text']);
?>
<section class="twitter-block">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 pt-lg pb-lg text-center">
				<div class="twitter-block__icon twitter"></div>
				<p class="twitter-block__tweet mt-md"><?php echo $tweet['text']; ?></p>
            	<p><a class="more" href="<?php the_field('social_twitter', 'option'); ?>">More Twitter</a></p>
            </div>
        </div>
    </div>
</section>
<?php
  endforeach;
?>
