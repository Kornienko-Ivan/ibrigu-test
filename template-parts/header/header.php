<?php 
    $logo = get_field('logo','option')
?>
<header id="header" class="header <?php echo is_front_page() ? 'header--white-transparent' : ''; ?>">
    <div class="container header__container">
        <div class="header__row">
            <div class="header__toggle nav-toggle">
                <div class="nav-toggle-icon">
                    <span></span>
                </div>
            </div>
            
            <nav class="header__nav">
                <div class="main-nav">
                    <?php wp_nav_menu( array('menu_id'=>'main-nav','container_class' => '','theme_location' => 'main-menu') ); ?>

                    <div class="header__lang lang--mobile">
                        <?php
                            if (function_exists('icl_get_languages')) {
                                $languages = icl_get_languages('skip_missing=0');
                                $loopCounter = 0;
                                if(true || 1 < count($languages)){ ?>
                                    <ul class="header__lang__list">
                                        <?php
                                            foreach($languages as $l){
                                                $label = $l['language_code']=='it'?'ITA':'ENG';
                                                ?>
                                                <?php if($loopCounter!=0): ?>
                                                    <li class="header__lang__item-sep">/</li>
                                                <?php endif; ?>
                                                <li class="header__lang__item">
                                                    <a href="<?php echo $l['url']; ?>" class="header__lang__item__link<?php if($l['active']) echo ' active'; ?> <?php echo $l['language_code']; ?>"><?php echo $label; ?></a>
                                                </li>
                                                <?php
                                                $loopCounter++;
                                            }
                                        ?>
                                    </ul>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="header__navClose"></div>
            </nav>

            <div class="header__lang lang--desktop">
                <?php
                    if (function_exists('icl_get_languages')) {
                        $languages = icl_get_languages('skip_missing=0');
                        $loopCounter = 0;
                        if(true || 1 < count($languages)){ ?>
                            <ul class="header__lang__list">
                                <?php
                                    foreach($languages as $l){
                                        $label = $l['language_code']=='it'?'ITA':'ENG';
                                        ?>
                                        <?php if($loopCounter!=0): ?>
                                            <li class="header__lang__item-sep">/</li>
                                        <?php endif; ?>
                                        <li class="header__lang__item">
                                            <a href="<?php echo $l['url']; ?>" class="header__lang__item__link<?php if($l['active']) echo ' active'; ?> <?php echo $l['language_code']; ?>"><?php echo $label; ?></a>
                                        </li>
                                        <?php
                                        $loopCounter++;
                                    }
                                ?>
                            </ul>
                            <?php
                        }
                    }
                ?>
            </div>

            <div class="header__logo">
                <a href="<?php echo get_home_url(); ?>" class="header--logo">
                    <?php if( !empty( $logo ) ): ?>
                        <?php echo file_get_contents(esc_url($logo['url'])); ?>
                    <?php endif; ?>
                </a>
            </div>

            <div class="header__wishlist">
                <a href="<?php echo get_site_url() . '/wishlist';?>">
                    <?php echo file_get_contents(esc_url(get_template_directory_uri() . '/assets/images/wishlist_icon.svg')); ?>
                    <div class="header__wishlistCount">
                        <?php if(do_shortcode('[yith_wcwl_items_count]') > 0): ?>
                            <?php echo do_shortcode('[yith_wcwl_items_count]'); ?>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
            
            <div class="header__cart">
                <a href="<?php echo get_site_url() . '/cart';?>">
                    <?php echo file_get_contents(esc_url(get_template_directory_uri() . '/assets/images/cart_icon.svg')); ?>
                </a>
            </div>
        </div>
    </div>
</header>