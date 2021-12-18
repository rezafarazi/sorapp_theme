<?php include "Header.php"; ?>


    <!--All Header Start-->
    <section>
        <div id="Header">
            <div id="Header-Inside">
                <center>
                    <img itemprop="image" src="<?php echo get_template_directory_uri(); ?>/Img/Logo.png" width="100px"/>
                    <br>
                    <br>
                    <br>
                    <p style="display:none;"><span itemprop="name">سورآپ</span></p>
                    <p>به وب سایت سورآپ خوش آمدید</p>
                </center>
            </div>
        </div>
    </section>
    <!--All Header End-->



    <!--Description Start-->
    <section style="display:none;">
        <p class="RTL_CLS">
            ما در این وب سایت قصد داریم به نقد و بررسی نرم افزار های جدید و تخصصی بپردازیم و کنار آن هم کمی آموزش برنامه نویسی به صورت مبتدی و حرفه ای آماده کنیم. شما می توانید انواع پروژه های خود نظر وب موبایل ویندوز لینوکس مک خود را به ما بسپارید با قیمت معقول و کمتر از بازار باتشکر از مطالعه متن.
        </p>
    </section>
    <!--Description End-->



    <!-- All Context Start-->
    <section>

        <br>
        <br>
        <br>

        <!-- New Posts Start-->
        <section>
            <center id="Context_Header_Text">
                <h4>مطالب تازه</h4>
            </center>
            <div class="continer">
            <div class="row Context_Row">
                <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
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
                    wp_reset_postdata();
                ?>
            </div>
        </div>
        </section>
        <!-- New Posts End-->

    </section>
    <!-- All Context End-->



<?php include "Footer.php"; ?>