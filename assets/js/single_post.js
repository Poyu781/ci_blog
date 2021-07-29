const postSection = document.querySelector(".post")
const commentSection = document.querySelector(".comment")
const sendCommentButton = document.querySelector(".btn_comment")
const commentText = document.querySelector("textarea[name=comment_text]")
const postId = postSection.id
sendCommentButton.addEventListener("click",()=>{
    data = {body:commentText.value,post_id:postId}
    fetch("/ci-framework/api/comments",{
        method: "POST",
        mode: 'same-origin',
        
        body : JSON.stringify(data),
        headers : {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        },
    })

        .then((res)=>{

            return res.json()
        })
        .catch((error) => {
            console.log('Error:', error)
        })
        .then((json)=>{
            console.log(json)
        })
})



console.log(postId)
let host_url = window.location;
console.log(`/ci-framework/api/posts${postId}`)
fetch(`/ci-framework/api/posts/${postId}`)
    .then((response) => {
        return response.json();
    })
    .then((postData) => {
        console.log(postData)
        postData = postData[0]
        text = `
        <h2>${postData.title}</h2>
        <small class="post-date">Posted on: ${postData.created_at}</strong></small><br>
        <div class="content jumbotron">
            ${postData.body}
        </div>
        `
        postSection.innerHTML = text
        console.log(postData)

    });

fetch(`/ci-framework/api/comments?posts=${postId}`)
    .then((response) => {
        return response.json();
    })
    .then((commentsData) => {
        commentsLen = commentsData.length
        for (let i = 0 ; i <commentsLen ;i++){
            let commentData = commentsData[i]
            nodeCreated = document.createElement("div")
            nodeCreated.classList.add("comment_wrapper");
            text = `
            <div class="panel panel-default">
            <div class="panel-body">
            ${commentData.body}
            </div>
            <div class="panel-footer"><small>${commentData.username} - ${commentData.created_at}</small></div>
            </div>
            `
            nodeCreated.innerHTML = text
            commentSection.append(nodeCreated)
        }

    });



