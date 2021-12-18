<?php include "Header.php"; ?>

<!--Search Result Start-->
<section>
    <div class="continer">
        <div class="row Context_Row">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
                <div class="col-md-4 Home_Item">
                    <div class="Post_Item">
                        <center>
                            <?php if ( has_post_thumbnail()) the_post_thumbnail('home-thumb'); ?>
                            <p class="Post_Item_Title"><?php the_title(); ?></p>
                            <p class="Post_Item_Text"><?php the_excerpt(); ?></p>
                            <br>
                            <a href="<?php the_permalink() ?>" class="Post_Item_More_Button">بیشتر</a>
                            <br>
                            <br>
                        </center>
                    </div>
                </div>
            <?php
                endwhile;
                endif;
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    <center>
        
                <?php
                
                    the_posts_pagination( array(
    				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
    				'next_text'          => __( 'Next page', 'twentysixteen' ),
    				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
    			) );
                
                ?>
                
                
                <style>
                    .screen-reader-text
                    {
                        display:none;
                    }
                    
                    .pagination
                    {
                        justify-content:center;
                    }
                </style>
                
        </center>
</section>
<!--Search Result End-->

<?php include "Footer.php"; ?>
