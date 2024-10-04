jQuery(document).ready(function($) {
    $('#category-select').change(function() {
        var catID = $(this).val(); // Get the selected category ID

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_posts_by_category', // Action name in PHP
                category: catID
            },
            success: function(response) {
                $('#post-results').html(response); // Display the posts in the div
            }
        });
    });
});