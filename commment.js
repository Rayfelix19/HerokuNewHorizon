

function likeComment(com_id) {
    // Send an AJAX request to update_likes.php with the commentId
    $.ajax({
        type: "POST",
        url: "update_likes.php",
        data: { com_id: com_id },
        success: function(response) {
            // Update the like count on the page
            $('#likes-' + com_id).text(response);
        }
    });
}

// Function to handle disliking a comment
function dislikeComment(com_id) {
    // Send an AJAX request to update_dislikes.php with the commentId
    $.ajax({
        type: "POST",
        url: "update_dislikes.php",
        data: { com_id: com_id },
        success: function(response) {
            // Update the dislike count on the page
            $('#dislikes-' + com_id).text(response);
        }
    });
}
/*
// Function to show the reply form
function showReplyForm(commentId) {
    $('#reply-form-' + commentId).show();
}
// Function to submit a reply for a comment

function submitReply(commentId) {
    // Get the reply input value
    var reply = $('#reply-input-' + commentId).val();

    // Send an AJAX request to add the reply to the database
    $.ajax({
        type: 'POST',
        url: 'update_com.php',
        data: {commentId: commentId, reply: reply},
        success: function(response) {
            // Append the new reply to the reply comments section
            $('#reply-comments-' + commentId).append(response);

            // Clear the reply input
            $('#reply-input-' + commentId).val('');
        }
    });
}
*/



function showReplyForm(com_id) {
    // Get the reply form element based on the comment ID
    //var replyForm = $('#reply-form-' + com_id);
    var replyForm = $('#reply-section-' + com_id);
    
    //replyForm.show();
    replyForm.toggle();
    // Check if the reply form is hidden
   // if (replyForm.is(':hidden')) {
        // Show the reply form
      //  replyForm.show();
   // } else {
        // Hide the reply form
       // replyForm.hide();
   // }
}

function submitReply(com_id) {
    // Retrieve the reply input value
    var replyInput = $('#reply-input-' + com_id);
    var reply = replyInput.val();

    // Send an AJAX request to submit_reply.php with the commentId and reply data
    $.ajax({
        type: "POST",
        url: "submitReply.php",
        data: { com_id: com_id, reply: reply },
        success: function(response) {
            // Request was successful, handle the response
            // You can update the UI with the submitted reply using JavaScript DOM manipulation
            // For example, you can create a new reply element and append it to the reply comments section
            var replyCommentsSection = $('#reply-comments-' + com_id);
            var newReply = $('<div>').html(response);
            replyCommentsSection.append(newReply);

            // Clear the reply input
            replyInput.val('');
        },
        error: function(xhr, textStatus, errorThrown) {
            // Request failed, handle the error
            console.error('Error submitting reply: ' + textStatus + ' - ' + errorThrown);
        }
    });
}

function submitComment() {
    // Get the comment input value
    var comments = $('#comment-input').val();
    //console.log(club_id);
    // Send an AJAX request to add_comment.php with the comment data
    $.ajax({
        type: "POST",
        url: "submit_reply.php",
        data: { comments: comments },
        success: function(response) {
            // Append the new comment HTML markup to the comments section
            $('#comments-section').prepend(response);

            // Clear the comment input field
            $('#comment-input').val('');
        }
    });
}

