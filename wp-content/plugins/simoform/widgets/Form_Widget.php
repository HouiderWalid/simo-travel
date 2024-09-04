<?php

use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Form_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'simo_form';
    }

    public function get_title()
    {
        return __('Simo Form', 'plugin-name');
    }

    public function get_icon()
    {
        return 'fa fa-envelope';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'form_title',
            [
                'label' => __('Form Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Custom Form', 'plugin-name'),
                'placeholder' => __('Enter your form title', 'plugin-name'),
            ]
        );

        // Add more controls for your form here
        // e.g., text fields, email fields, etc.

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        echo '<div class="custom-form-widget">';

        echo '<div id="email-form-response"
                 class="flex mt-8 hidden items-center p-4 mb-4 text-sm text-red-800 border border-red-300 bg-red-50"
                 role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="alert-content">

                </div>
            </div>';

        echo '<form id="contact-us-form" action="" method="post">';
        echo '<div style="display: flex; gap: 20px" class="mb-5">
                <input type="text" id="name" name="name"
                       class="border text-md border-gray-300 text-gray-900 h-12 focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                       placeholder="Your Name" required/>
               <input type="text" id="email" name="email"
                       class="border text-md border-gray-300 text-gray-900 h-12 focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                       placeholder="Your Email" required/>
            </div>';
        echo '<div class="mb-5">
                <input type="text" id="subject" name="subject"
                       class="border text-md border-gray-300 text-gray-900 h-12 focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                       placeholder="Subject" required/>
            </div>';
        echo '<div class="mb-5">
                <textarea id="message" name="message" rows="4" class="border text-md border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full p-4" 
                placeholder="Write a your message here..." required></textarea>

            </div>';
        echo '<div style="display: flex; justify-content: end">
                <button type="submit"
                                    class="text-white w-full bg-blue-950 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm sm:w-auto px-5 py-2.5 text-center">
                                Send Message
                </button>
              </div>';
        echo '</form>';

        echo '</div>';
    }

    protected function _content_template()
    {
        ?>
        <# if ( settings.form_title ) { #>
        <h2>{{{ settings.form_title }}}</h2>
        <# } #>
        <form action="" method="post">
            <div class="mb-5">
                <input type="text" id="name"
                       class="border text-md border-gray-300 text-gray-900 h-12 focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                       placeholder="Your Name"/>
            </div>
            <div class="mb-5">
                <input type="text" id="email"
                       class="border text-md border-gray-300 text-gray-900 h-12 focus:ring-blue-500 focus:border-blue-500 block w-full p-4"
                       placeholder="Your Email"/>
            </div>
            <button type="submit"
                    class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm sm:w-auto px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
        <?php
    }
}