const url = window.location.pathname;
const postId = url.split('/')[4]
const bodySection = document.querySelector("textarea[name=body]")
const titleSection = document.querySelector("input[name=title]")
const idSection = document.querySelector("input[name=id]")
if (postId){
idSection.value = postId
    fetch(`/ci-framework/api/posts/${postId}`)
        .then((response) => {
            return response.json();
        })
        .then((postData) => {
            console.log(postData)
            postData = postData[0]
            bodySection.innerHTML = postData.body
            titleSection.value = postData.title
        });
}