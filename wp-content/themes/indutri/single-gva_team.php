<?php 
  get_header(apply_filters('indutri_get_header_layout', null )); 
  wp_enqueue_script( 'waypoints' );
  
  $page_id = indutri_id();
  $page_title_style = get_post_meta($page_id, 'indutri_page_title_style', true );
  if(empty($page_title_style)) $page_title_style = 'standard';
?>

<section id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
  <?php do_action( 'indutri_before_page_content' ); ?>
  <div class="container">  
    <div class="main-page-content row">
      <!-- Main content -->
      <div class="content-page col-xs-12">      
        <?php while ( have_posts() ) : the_post(); ?>
          <?php
            $team_position = get_post_meta(get_the_id(), 'indutri_team_position', true );
            $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
            $team_skills = get_post_meta(get_the_id(), 'team_skills', false );
            $team_educations = get_post_meta(get_the_id(), 'team_educations', false );
            $team_quote = get_post_meta(get_the_id(), 'indutri_team_quote', true );
            $team_email = get_post_meta(get_the_id(), 'indutri_team_email', true );
            $team_phone = get_post_meta(get_the_id(), 'indutri_team_phone', true );
            $team_address = get_post_meta(get_the_id(), 'indutri_team_address', true );

            if(isset($team_socials[0])){
              $team_socials = $team_socials[0];
            }
            if(isset($team_skills[0])){
              $team_skills = $team_skills[0];
            }
            if(isset($team_educations[0])){
              $team_educations = $team_educations[0];
            }
          ?>
          <div class="team-block-single clearfix single row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 team-image">
              <div class=" team-thumbnail">
                <div class="d-xl-none d-lg-none d-md-none d-sm-block d-block margin-bottom-20">
                  <h2 class="team-name clearfix"><?php the_title() ?></h2>
                  <div class="team-job"><?php echo esc_html( $team_position ); ?></div>
              </div>

                <?php the_post_thumbnail('full'); ?>
                <div class="heading"><?php echo esc_html__('Contact Info', 'indutri') ?></div>
                
                <?php if($team_email){ ?>
                  <div class="team-email"><label><?php echo esc_html__('Email: ', 'indutri') ?></label>
                    <a href="mailto:<?php echo esc_html( $team_email ) ?>"><?php echo esc_html( $team_email ) ?></a>
                  </div>
                <?php } ?>

                <?php if($team_phone){ ?>
                  <div class="team-phone"><label><?php echo esc_html__('Phone: ', 'indutri') ?></label>
                    <a href="tel:<?php echo esc_html( $team_phone ) ?>"><?php echo esc_html( $team_phone ) ?></a>
                  </div>
                <?php } ?>

                <?php if($team_socials){ ?>
                  <div class="socials-team">
                    <?php foreach ($team_socials as $key => $social) { ?>
                      <?php if(isset($social['link']) && isset($social['icon'])){ ?>
                        <a class="gva-social" href="<?php echo esc_url($social['link']) ?>">
                          <i class="<?php echo esc_attr($social['icon']) ?>"></i>
                        </a>
                      <?php } ?>   
                    <?php } ?>
                   </div>
                <?php } ?>

              </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
              <div class="d-xl-block d-lg-block d-md-block d-sm-none d-none">
                <h2 class="team-name clearfix"><?php the_title() ?></h2>
                <div class="team-job"><?php echo esc_html( $team_position ); ?></div>
              </div>
              <?php if( is_array($team_educations) && isset($team_educations[1]) ){ ?>
                <div class="team-educations">
                  <div class="heading"><?php echo esc_html__('Educations', 'indutri') ?></div>
                  <?php if($team_educations){ ?>
                    <div class="educations">
                      <?php 
                      foreach ($team_educations as $key => $education) { 
                        if(isset($education['title'])){ 
                          echo '<div class="education">' . esc_html($education['title']) . '</div>';
                        }
                      } 
                      ?>
                    </div>
                  <?php } ?> 
                </div>
              <?php } ?>

              <?php if( is_array($team_skills) && isset($team_skills[1]) ){ ?>
                <div class="team-skills clearfix margin-bottom-30">
                  <div class="heading"><?php echo esc_html__('Skills', 'indutri') ?></div>
                  <div class="clearfix">
                    <?php foreach ($team_skills as $key => $skill) { ?>
                      <?php if(isset($skill['label']) && isset($skill['volume'])){ ?>
                        <div class="team-progress-wrapper clearfix margin-bottom-20">
                          <div class="team__progress-label"><?php echo esc_html( $skill['label'] ); ?></div>
                          <div class="team__progress">
                            <div class="team__progress-bar" data-progress-max="<?php echo esc_attr( $skill['volume'] ) ?>%">
                              <?php if($skill['volume'] > 75){ ?>
                                <span class="percentage percentage-left"><?php echo esc_attr( $skill['volume'] ) ?>%</span>
                              <?php }else{ ?>  
                                <span class="percentage"><?php echo esc_attr( $skill['volume'] ) ?>%</span>
                              <?php } ?>  
                            </div>
                          </div>  
                        </div>  
                      <?php } ?>   
                    <?php } ?>
                  </div>  
                </div>
              <?php } ?>  

              <div class="team-content margin-top-40"><?php the_content() ?></div>
              <?php if($team_quote){ ?>
                <div class="team-quote margin-top-40"><?php echo wp_kses( $team_quote, true ) ?></div>
              <?php } ?>  
            </div>
          </div>
        <?php endwhile; ?> 
      </div>      
    </div>   
  <?php do_action( 'indutri_after_page_content' ); ?>
</section>

<?php get_footer(); ?>