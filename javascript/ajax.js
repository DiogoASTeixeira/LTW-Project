function votePost(post_id, value){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            if(value == 1 && document.getElementById("upvoteBtn").innerHTML =="Upvote")
            {
                document.getElementById("upvoteBtn").innerHTML = "Upvoted";
                document.getElementById("downvoteBtn").innerHTML = "Downvote";
                
                //TODO upvote
            }
            else if( value == -1 && document.getElementById("downvoteBtn").innerHTML =="Downvote")
            {
                document.getElementById("upvoteBtn").innerHTML = "Upvote";
                document.getElementById("downvoteBtn").innerHTML = "Downvoted";
                
                //TODO downvote
            }
            else
            {
                document.getElementById("upvoteBtn").innerHTML = "Upvote";
                document.getElementById("downvoteBtn").innerHTML = "Downvote";
                
                //TODO cancel vote
            }
            document.getElementById("upvote").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../database/process_vote.php?post_id=" + post_id + "&value=" + value, true);
    xmlhttp.send();
}

function reorderPosts(post_id, value){
    var xmlhttp = new XMLHttpRequest();
    let selected = document.getElementById("order").value;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("list_posts").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../database/order_list_posts.php?order=" + selected, true);
    xmlhttp.send();
}