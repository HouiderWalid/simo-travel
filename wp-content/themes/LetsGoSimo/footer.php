<?php
$options = get_option('settings');
$facebookUrl = isset($options['facebook_url']) ? esc_url($options['facebook_url']) : '';
$instagramUrl = isset($options['instagram_url']) ? esc_url($options['instagram_url']) : '';
$email = $options['email'] ?? '';
$phone = $options['phone_number'] ?? '';
?>
    <div class="mt-auto text-white px-12 lg:px-0" style="background-color: #021027">

        <div class="flex gap-x-32 gap-y-16 mx-auto w-full lg:max-w-4xl flex-col sm:flex-row xl:max-w-6xl py-12">
            <div class="flex flex-col gap-y-4">
                <div class="flex justify-center sm:justify-start">
                    <a href="/">
                        <span class="text-3xl font-bold text-white">LET'S<span class="text-blue-600">TRAVEL</span></span>
                    </a>
                </div>
                <div class="flex flex-col items-center sm:items-start gap-y-4 my-4">
                    <div class="flex items-center gap-x-2">
                        <svg width="20" height="20" style="fill: white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>email</title>
                            <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                        </svg>
                        <span><?php echo $email ?></span>
                    </div>
                    <div class="flex items-center gap-x-2">
                        <svg width="20" height="20" style="fill: white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>phone</title>
                            <path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                        </svg>
                        <span><?php echo $phone ?></span>
                    </div>
                </div>
                <div class="flex justify-center sm:justify-start gap-x-6">
                    <a href="<?php echo $facebookUrl ?>">
                        <svg width="20" height="20" style="fill: white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>facebook</title>
                            <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                        </svg>
                    </a>
                    <a href="<?php echo $instagramUrl ?>">
                        <svg width="20" height="20" style="fill: white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>instagram</title>
                            <path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex flex-col items-center sm:items-start gap-y-8">
                <h1 class="text-xl">LINKS</h1>
                <ul class="flex flex-col gap-y-4">
                    <li>Home</li>
                    <li>About</li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
        <div class="mx-auto w-full lg:max-w-4xl xl:max-w-6xl py-6 border-t" style="border-top-color: #2563eb">
            <p class="text-center sm:text-start">Copyright © Domain. All Rights Reserved.</p>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
