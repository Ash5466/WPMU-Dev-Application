<?php 

// Add Shortcode
function subform() {
    
    // Get the current user
    $current_user = wp_get_current_user();

    // Check if user is logged in
    if ($current_user->exists()) {
        // Get the first name or fallback to display name
        $user_display_name = !empty($current_user->user_firstname) ? $current_user->user_firstname : $current_user->display_name;
    } else {
        $user_display_name = 'Guest';
    }

    // Get the blog name
    $blog_name = get_bloginfo('name');

    // Build the form content
    $content = '<p>Hey ' . esc_html($user_display_name) . ', welcome to ' . esc_html($blog_name) . '! You can subscribe to our newsletter here:</p>';
    $content .= '
    <form action="/thank-you" method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Submit">
    </form>';

    // Return the content for the shortcode
    return $content;
}
add_shortcode('subscriptionform', 'subform');
