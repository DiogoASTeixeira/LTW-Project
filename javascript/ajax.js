//upvoteValue();

function votePost(post_id, value) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myobj = JSON.parse(this.responseText);
            document.getElementById("upvote").innerHTML = myobj[0];
            if (myobj[1] == 1) //is upvoted
            {
                document.getElementById("upvoteBtn").innerHTML = "Upvoted";
                document.getElementById("downvoteBtn").innerHTML = "Downvote";
            } else if (myobj[1] == -1) //is downvoted
            {
                document.getElementById("upvoteBtn").innerHTML = "Upvote";
                document.getElementById("downvoteBtn").innerHTML = "Downvoted";
            } else {
                document.getElementById("upvoteBtn").innerHTML = "Upvote";
                document.getElementById("downvoteBtn").innerHTML = "Downvote";
            }
        }
    };
    xmlhttp.open("GET", "../database/process_vote.php?post_id=" + post_id + "&value=" + value, true);
    xmlhttp.send();
}

function voteComment(comment_id, value) {
    var xmlhttp = new XMLHttpRequest();
    let comment = document.getElementById("single_comment");
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(comment);
        }
    };
    xmlhttp.open("GET", "../database/process_vote_comment.php?comment_id=" + comment_id + "&value=" + value, true);
    xmlhttp.send();
}

function upvoteValue() {
    var xmlhttp = new XMLHttpRequest();
    let post_id = document.getElementById("post_id").innerHTML;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let vote_value = this.responseText;

            if (vote_value == 1) //is upvoted
            {
                document.getElementById("upvoteBtn").innerHTML = "Upvoted";
                document.getElementById("downvoteBtn").innerHTML = "Downvote";
            } else if (vote_value == -1) //is downvoted
            {
                document.getElementById("upvoteBtn").innerHTML = "Upvote";
                document.getElementById("downvoteBtn").innerHTML = "Downvoted";
            } else {
                document.getElementById("upvoteBtn").innerHTML = "Upvote";
                document.getElementById("downvoteBtn").innerHTML = "Downvote";
            }
        }
    }
    xmlhttp.open("GET", "../database/user_post_vote.php?post_id=" + post_id, true);
    xmlhttp.send();
}

function reorderPosts(post_id, value) {
    var xmlhttp = new XMLHttpRequest();
    let selected = document.getElementById("order").value;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("list_posts").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../database/order_list_posts.php?order=" + selected, true);
    xmlhttp.send();
}