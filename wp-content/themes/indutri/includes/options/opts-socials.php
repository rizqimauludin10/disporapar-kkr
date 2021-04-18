<?php
Redux::setSection( $opt_name, array(
   'title'     => esc_html__( 'Social Profiles', 'indutri' ),
   'icon'      => 'el-icon-share',
   'fields' => array(
      array(
         'id'     => 'social_facebook',
         'type'      => 'text',
         'title'  => esc_html__( 'Facebook', 'indutri' ),
         'desc'      => esc_html__( 'Enter your Facebook profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_instagram',
         'type'      => 'text',
         'title'     => esc_html__( 'Instagram', 'indutri' ),
         'desc'      => esc_html__( 'Enter your Instagram profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_twitter',
         'type'      => 'text',
         'title'     => esc_html__( 'Twitter', 'indutri' ),
         'desc'      => esc_html__( 'Enter your Twitter profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_googleplus',
         'type'      => 'text',
         'title'     => esc_html__( 'Google+', 'indutri' ),
         'desc'      => esc_html__( 'Enter your Google+ profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_linkedin',
         'type'      => 'text',
         'title'     => esc_html__( 'LinedIn', 'indutri' ),
         'desc'      => esc_html__( 'Enter your LinkedIn profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_pinterest',
         'type'      => 'text',
         'title'     => esc_html__( 'Pinterest', 'indutri' ),
         'desc'      => esc_html__( 'Enter your Pinterest profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_rss',
         'type'      => 'text',
         'title'     => esc_html__( 'RSS', 'indutri' ),
         'desc'      => esc_html__( 'Enter your RSS feed URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_tumblr',
         'type'      => 'text',
         'title'     => esc_html__( 'Tumblr', 'indutri' ),
         'desc'      => esc_html__( 'Enter your Tumblr profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_vimeo',
         'type'      => 'text',
         'title'     => esc_html__( 'Vimeo', 'indutri' ),
         'desc'      => esc_html__( 'Enter your Vimeo profile URL.', 'indutri' ),
         'default'   => ''
      ),
      array(
         'id'     => 'social_youtube',
         'type'      => 'text',
         'title'     => esc_html__( 'YouTube', 'indutri' ),
         'desc'      => esc_html__( 'Enter your YouTube profile URL.', 'indutri' ),
         'default'   => ''
      )
   )
));