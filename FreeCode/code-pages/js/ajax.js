// <!-- for view count -->
$(document).ready(function() {
    $('.card-stats .visitor-count').click(function() {
        var type = $(this).data('type');
        var postId = $(this).data('postid');
        var clickedElement = $(this);

        $.ajax({
            type: 'GET',
            url: 'includes/interaction_counter.php',
            data: { interactionType: type, postId: postId },
            success: function(response) {
                console.log(response);
                var iconHtml = clickedElement.find('a').prop('outerHTML');
                clickedElement.html(iconHtml + ' ' + response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});

// <!-- for download count -->
$(document).ready(function() {
    $('.card-stats .download-count').click(function() {
        var type = $(this).data('type');
        var postId = $(this).data('postid');
        var clickedElement = $(this);

        $.ajax({
            type: 'GET',
            url: 'includes/interaction_counter.php',
            data: { interactionType: type, postId: postId },
            success: function(response) {
                console.log(response);
                var iconHtml = clickedElement.find('i').prop('outerHTML');
                clickedElement.html(iconHtml + ' ' + response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});

// <!-- for button download on hover count -->
function updateDownloadCount(postId) {
    $.ajax({
      type: "GET",
      url: "includes/interaction_counter.php",
      data: { interactionType: "download", postId: postId },
      success: function(response) {
  
        var downloadCountElement = $('[data-type="download"][data-postid="' + postId + '"] .count');
        downloadCountElement.text(response);

        console.log(response);
      },
      error: function(error) {
        console.error("Error:", error);
      }
    });
  }

//<!-- for like count -->
$(document).ready(function() {
    $('.like-count').click(function() {
        var type = $(this).data('type');
        var postId = $(this).data('postid');
        var clickedElement = $(this);
        var isLiked = clickedElement.hasClass('liked');

        $.ajax({
            type: 'GET',
            url: 'includes/like_count.php',
            data: { interactionType: type, postId: postId, isLiked: isLiked },
            success: function(response) {
                console.log(response);
                var iconHtml = clickedElement.find('i').prop('outerHTML');
                clickedElement.html(iconHtml + ' ' + response);

                // Toggle the 'liked' class and change the color
                if (isLiked) {
                    clickedElement.removeClass('liked');
                    clickedElement.css('color', 'black');
                } else {
                    clickedElement.addClass('liked');
                    clickedElement.css('color', 'green');
                }
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    });
});