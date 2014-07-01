<?php

class GO_Feed_Copyright
{
	private $config = NULL;

	/**
	 * constructor
	 */
	public function __construct()
	{
		add_action( 'go_feed_copyright_remove', array( $this, 'remove' ) );
		add_filter( 'the_content_feed', array( $this, 'the_content_feed' ) );
		add_filter( 'the_permalink', array( $this, 'the_permalink' ) );
	}//end __construct

	/**
	 * loads config settings
	 */
	public function config( $key = NULL )
	{
		if ( ! $this->config )
		{
			$default = array(
				'utm' => array(
					'utm_source' => 'feed',
					'utm_medium' => 'feed',
					'utm_campaign' => 'feed',
				),
			);

			$this->config = apply_filters( 'go_config', $default, 'go-feed-copyright' );
		}//end if

		if ( $key )
		{
			return isset( $this->config[ $key ] ) ? $this->config[ $key ] : NULL;
		}//end if

		return $this->config;
	}//end config

	/**
	 * hooked to the_content_feed filter to truncate content and force a copyright message
	 */
	public function the_content_feed( $content )
	{
		ob_start();
		include __DIR__ . '/templates/copyright.php';
		$content .= ob_get_clean();
		return $content;
	}//end the_content_feed

	/**
	 * hooked to the_permalink filter to add UTM codes to permalinks
	 */
	public function the_permalink( $url )
	{
		return add_query_arg( $this->config( 'utm' ), $url );
	}//end the_permalink

	/**
	 * hooked to go_feed_copyright_remove to allow other stuff to disable the adding of copyright
	 */
	public function remove()
	{
		remove_filter( 'the_content_feed', array( $this, 'the_content_feed' ) );
		remove_filter( 'the_permalink', array( $this, 'the_permalink' ) );
	}//end remove
}//end class

/**
 * singleton
 */
function go_feed_copyright()
{
	global $go_feed_copyright;

	if ( ! $go_feed_copyright )
	{
		$go_feed_copyright = new GO_Feed_Copyright;
	}//end if

	return $go_feed_copyright;
}//end go_feed_copyright
