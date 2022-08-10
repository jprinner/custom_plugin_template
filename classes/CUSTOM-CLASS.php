<?php
//CUSTOM Class
class CUSTOM {
	  
	//Properties
    public $post_id; //post id
	public $created_at; //post date
	public $last_updated; //post modified time
	public $permalink; //post permalink
	public $first_name; //First Name
	public $last_name; //Last Name
	public $email; //email address

	//Methods
    function __construct($value, $get_by = 'post_id') {
		if ($get_by == 'post_id') {
			$this->post_id = $value;
		} else {
			return false;
		}
		if (!(get_post_status( $this->post_id )) || ($this->post_id == NULL)) {
			return false;
		}
		$CUSTOM_POST = get_post($this->post_id);
		$this->permalink = get_permalink($CUSTOM_POST);
		$this->created_at = $CUSTOM_POST->post_date;
		$this->last_updated = $CUSTOM_POST->post_modified;
		$this->first_name = get_field('first_name', $this->post_id);
		$this->last_name = get_field('last_name', $this->post_id);
		$this->email = get_field('email', $this->post_id);
	}

	//Static Methods
	static function get_CUSTOM_POSTS($output = 'ids', $args) { //$output takes either ids or objects
		$query = array(
			'posts_per_page'	=> -1,
			'post_type'			=> 'CUSTOM_POST',
    		);
		if (($args['category']) && ($args['category'] != 'All')) {
			$query['tax_query'][] = 
			    array(
			        'taxonomy' => 'category',
			        'field' => 'slug',
			        'terms' => $args['category'],
			        )
			    ;
		}
		$posts = get_posts($query);
		if ($output == 'objects') {
			$CUSTOM_POST_objs = $posts;
			$return = $CUSTOM_POST_objs;
		} else {
			$CUSTOM_POST_ids = array();
			foreach ($posts as $post) {
				$CUSTOM_POST_ids[] = $post->ID;
			}
			$return = $CUSTOM_POST_ids;
		}
		return $return;
	}
}