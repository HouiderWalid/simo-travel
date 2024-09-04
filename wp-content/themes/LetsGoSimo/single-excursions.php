<?php
get_header();
$passengers = 2;
$price = 40;
?>

<?php if (has_post_thumbnail()): ?>
    <div class="h-80 relative">
        <div class="flex justify-center items-center absolute h-full w-full" style="background-color: rgba(0,0,0, .4)">
            <h1 class="text-white text-4xl font-bold"><?php the_title() ?></h1>
        </div>
        <img class="object-cover h-full w-full" src="<?php the_post_thumbnail_url(); ?>"
             alt="<?php the_title(); ?>"/>
    </div>
<?php endif; ?>


    <div class="w-full m-auto my-20" style="max-width: 1150px">

        <h1 class="mb-20 text-2xl text-center">Booking Information</h1>

        <form id="reservation-form" class="px-8 py-1 bg-white" style="box-shadow: 0 1rem 3rem rgba(0,0,0,.175)">
            <?php wp_nonce_field('reservation_form_action', 'reservation_form_nonce'); ?>

            <div id="reservation-form-response"
                 class="flex mt-8 hidden items-center p-4 mb-4 text-sm text-red-800 border border-red-300 bg-red-50"
                 role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="alert-content">

                </div>
            </div>

            <div class="flex gap-12 my-8">

                <label class="block text-sm font-medium text-gray-900 w-1/2">
                    <span>Full Name</span>
                    <input type="text" name="full_name"
                           class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="Enter your full name" required/>
                </label>
                <label class="block text-sm font-medium text-gray-900 w-1/2">
                    <span>Phone Number</span>
                    <input type="text" name="phone_number"
                           class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="Your phone number"/>
                </label>
            </div>
            <div class="flex gap-12 my-8">

                <label class="block text-sm font-medium text-gray-900 w-1/2">
                    <span>Email</span>
                    <input type="email" name="email"
                           class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                           placeholder="Your email"/>
                </label>
                <span class="w-1/2"></span>
            </div>

            <div class="flex gap-12 my-8">

                <label class="block mb-2 text-sm font-medium text-gray-900 w-1/2">
                    <span>Pickup Date</span>
                    <input type="date" name="pickup_date"
                           class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    />
                </label>
                <label class="block mb-2 text-sm font-medium text-gray-900 w-1/2">
                    <span>Pickup Time</span>
                    <input type="time" value="08:30" name="pickup_time"
                           class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    />
                </label>
            </div>

            <div class="flex gap-12 my-8">

                <label class="block mb-2 text-sm font-medium text-gray-900 w-1/2">
                    <span>Pickup Address</span>
                    <input type="text" placeholder="Your Hotel or Residence" name="pickup_address"
                           class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    />
                </label>
                <label class="block mb-2 text-sm font-medium text-gray-900 w-1/2">
                    <span>Chamber Number</span>
                    <input type="text" placeholder="Your Chamber Number" name="pickup_chamber_number"
                           class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    />
                </label>
            </div>

            <div class="flex gap-12 my-8">

                <label class="block mb-2 text-sm font-medium text-gray-900 w-1/2">
                    <span>Passengers</span>
                    <input type="number" value="<?php echo $passengers ?>" name="passengers"
                           class="bg-gray-50 border mt-2 border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    />
                </label>
                <span class="flex items-center w-1/2">
                    Price: <span><?php echo ' $' . $passengers * $price ?></span>
                </span>
            </div>

            <div class="flex justify-center gap-12 my-8">
                <button type="submit"
                        class="text-white w-full max-w-36 bg-blue-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center">
                    Reserve
                </button>
            </div>
        </form>

        <h1 class="my-20 text-2xl text-center">Description</h1>


        <div class="p-8 bg-white" style="box-shadow: 0 1rem 3rem rgba(0,0,0,.175)">
            <?php the_content() ?>
        </div>

    </div>


<?php
get_footer();
?>