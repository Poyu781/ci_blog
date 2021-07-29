const postSection = document.querySelector(".post")
const postId = postSection.id

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