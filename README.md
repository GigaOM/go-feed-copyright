# go-feed-copyright

Adds copyright lines & UTM codes to feed articles

## Usage

To enable, simply activate the plugin.

### UTM Codes

You can create a `go-feed-copyright.php` config file to control the UTM codes, though the config defaults to the following:

```
array(
  'utm' => array(
	  'utm_source' => 'feed',
		'utm_medium' => 'feed',
		'utm_campaign' => 'feed',
	),
)
```

### Disabling copyright lines programmatically

If you need to disable the copyright lines and UTM codes for certain
cases, you can simply call a remove action:

```php
do_action( 'go_feed_copyright_remove' );
```
