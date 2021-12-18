<?php include "Header.php";?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php gt_set_post_view(); ?>

    <!--Single Content All Start-->
    <section>

        <!--Header Start-->
        <div id="Single_Header">

            <!--Header Image Start-->
            <div id="Single_Header_Inside_Background"></div>
            <div id="Single_Header_Inside_Background_Image"><?php if ( has_post_thumbnail()) the_post_thumbnail('home-thumb');?></div>
            <!--Header Image End-->

            <div id="Single_Header_Inside_Title">
                <center>
                    <h3> <?php the_title(); ?></h3>
                </center>
            </div>
        </div>
        <!--Header End-->





        <!--Page Content Start-->
        <div class="continer-fulid RTL_CLS">

            <div class="row">

                <!--Context Start-->
                <div class="col-md-9 Context">

                    <!--Content Start-->
                    <div class="Context_Inside">
                        <?php the_content(); ?>
                    </div>
                    <!--Content End-->



                    <!--Posts Start-->
                    <div class="continer">
                        <div class="row Context_Row">
                            <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
                            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                            <div class="col-md-4 Home_Item">
                                <div class="Post_Item">
                                    <center>
                                        <?php the_post_thumbnail('home-thumb'); ?>
                                        <p class="Post_Item_Title"><?php the_title(); ?></p>
                                        <p class="Post_Item_Text"><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink() ?>" class="Post_Item_More_Button">بیشتر</a>
                                        <br>
                                        <br>
                                    </center>
                                </div>
                            </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <!--Posts End-->



                    <!--Comment Start-->
                    <?php

                        if (comments_open())
                        {
                            comments_template();
                        }

                    ?>
                    <!--Comment End-->


                </div>
                <!--Context End-->


                <?php
                    $post_author = get_post();
                ?>


                <!--Ditales Start-->
                <div class="col-md-3 Ditales">
                    <div class="Ditales_Inside">
                        <center>
                            <h6>جزئیات</h6>

                            <br>
                            <?php
                                $user = wp_get_current_user();
                                 
                                if ( $user ) :
                                    ?>
                                    <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
                                <?php endif; ?>
                            <br>
                            <br>

                            <table width="100%">
                                <tr>
                                    <td dir="rtl">نویسنده</td>
                                    <td dir="ltr"><?php the_author(); ?></td>
                                </tr>
                                <tr>
                                    <td dir="rtl">تاریخ انتشار</td>
                                    <td dir="ltr"><?php the_time('m-d-y'); ?></td>
                                </tr>
                                <tr>
                                    <td dir="rtl">تعداد بازدید</td>
                                    <td dir="ltr"><?php echo gt_get_post_view(); ?></td>
                                </tr>
                                <tr>
                                    <td dir="rtl">زمان تقریبی مطالعه</td>
                                    <td dir="ltr">دقیقه 10</td>
                                </tr>
                                <tr>
                                    <td dir="rtl">از شاخه</td>
                                    <td dir="ltr"><?php echo get_the_category( $id )[0]->name; ?></td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>
                <!--Ditales End-->

            </div>

        </div>
        <!--Page Content End-->




        <style>

            .Post_Item>center>img
            {
                height: 150px;
            }

        </style>




    </section>
    <!--Single Content All End-->

    <?php endwhile; ?>
    <?php endif; ?>


    <?php
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count بازدید ";
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );
    ?>

<?php include "Footer.php";?>