<?php
get_header();
get_template_part('includes/section', 'content');

?>
    <div id="excursions" class="w-full" style="max-width: 1150px; margin: 100px auto">


        <div class="flex flex-col gap-10">
            <?php

            $categories = get_terms(array(
                'taxonomy' => 'excursion_types',
                'hide_empty' => true, // Only show categories with posts
            ));

            foreach ($categories as $category) :?>
                <div class="lg:px-0 px-4">
                    <h2 class="text-4xl mb-10 font-bold md:text-start text-center"><?php echo $category->name ?></h2>
                    <div class="flex gap-5 flex-wrap md:justify-start justify-center">


                        <?php

                        $categoryPosts = new WP_Query([
                            'post_type' => 'excursions',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'excursion_types',
                                    'field' => 'term_id',
                                    'terms' => $category->term_id,
                                ),
                            ),
                            'posts_per_page' => 5,
                        ]);

                        if ($categoryPosts->have_posts()) :
                            while ($categoryPosts->have_posts()) : $categoryPosts->the_post();

                                $availability = get_post_meta(get_the_ID(), 'excursion_availability', true);
                                $startAt = get_post_meta(get_the_ID(), 'excursion_start_at', true);
                                $foodInclusion = get_post_meta(get_the_ID(), 'excursion_food_inclusion', true);
                                $ticket = get_post_meta(get_the_ID(), 'excursion_ticket', true);
                                ?>

                                <div class="hover:shadow-2xl flex flex-col"
                                     style="width: 350px; background-color: white; transition: all ease-in-out .25s">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" style="height: 250px; object-fit: cover" alt="<?php the_title(); ?>"/>
                                    <?php endif; ?>
                                    <div class="flex flex-col justify-between gap-3 p-4 grow">
                                        <div>
                                            <h2 style="font-size: 20px"><?php the_title(); ?></h2>
                                            <div class="flex flex-col gap-1 my-2 font-light">
                                                <?php if ($availability): ?>
                                                    <div class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                             viewBox="0 0 24 24">
                                                            <title>
                                                                calendar-month-outline</title>
                                                            <path d="M7 11H9V13H7V11M21 5V19C21 20.11 20.11 21 19 21H5C3.89 21 3 20.1 3 19V5C3 3.9 3.9 3 5 3H6V1H8V3H16V1H18V3H19C20.11 3 21 3.9 21 5M5 7H19V5H5V7M19 19V9H5V19H19M15 13V11H17V13H15M11 13V11H13V13H11M7 15H9V17H7V15M15 17V15H17V17H15M11 17V15H13V17H11Z"/>
                                                        </svg>
                                                        <div>
                                                            Availability: <?php echo $availability ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($startAt): ?>
                                                    <div class="flex items-center gap-2">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 viewBox="0 0 24 24">
                                                                <title>
                                                                    clock-outline</title>
                                                                <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            Start
                                                            at: <?php echo $startAt ?></div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($foodInclusion): ?>
                                                    <div class="flex items-center gap-2">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                 viewBox="0 0 24 24">
                                                                <title>
                                                                    hamburger</title>
                                                                <path d="M22 13C22 14.11 21.11 15 20 15H4C2.9 15 2 14.11 2 13S2.9 11 4 11H13L15.5 13L18 11H20C21.11 11 22 11.9 22 13M12 3C3 3 3 9 3 9H21C21 9 21 3 12 3M3 18C3 19.66 4.34 21 6 21H18C19.66 21 21 19.66 21 18V17H3V18Z"/>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <?php echo $foodInclusion ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($ticket): ?>
                                                    <div class="flex items-center gap-2">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24">
                                                                <title>ticket-confirmation</title>
                                                                <path d="M13,8.5H11V6.5H13V8.5M13,13H11V11H13V13M13,17.5H11V15.5H13V17.5M22,10V6C22,4.89 21.1,4 20,4H4A2,2 0 0,0 2,6V10C3.11,10 4,10.9 4,12A2,2 0 0,1 2,14V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V14A2,2 0 0,1 20,12A2,2 0 0,1 22,10Z"/>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <?php echo $ticket ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="mt-1 mb-3"
                                                 style="height: 1px; background-color: rgba(0,0,0,.25)"></div>
                                            <div class="flex justify-between items-center">
                                                <a href="<?php the_permalink(); ?>"
                                                   class="text-white bg-blue-950 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 me-2 focus:outline-none">
                                                    Reserve
                                                </a>
                                                <div class="text-2xl"><?php echo get_post_meta(get_the_ID(), 'excursion_price', true) ?></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            <?php endwhile;
                        else :
                            echo '<p>No posts found in this category.</p>';
                        endif; ?>
                    </div>
                </div>


            <?php endforeach; ?>

        </div>
    </div>

<?php

get_footer();
