const postSection = document.querySelector(".post__section")
const memberId = document.querySelector("#id").innerText
let deleteButton
fetch(`/ci-framework/api/posts?user=${memberId}`)

    .then((response) => {
        return response.json();
    })
    .then((postsData) => {
        commentsLen = postsData.length
        if (commentsLen === undefined ){
            console.log(3)
            postSection.innerHTML = "沒有文章"
        }
        for (let i = 0 ; i <commentsLen ;i++){
            let postData = postsData[i]
            nodeCreated = document.createElement("div")
            nodeCreated.classList.add("post_wrapper");
            nodeCreated.classList.add("jumbotron");
            text = `
            <a href=/ci-framework/posts/${postData.id}>
            <h3>${postData.title}</h3>
            </a>
            <div class="row " >
                <div class="col-md-9">
                    <small class="post-date">Posted on: ${postData.created_at}</strong></small><br>
                    <div style="margin:10px;font-size:20px;">
                ${postData.body}
                </div>
                </div>
            </div>	
            <a href=/ci-framework/posts/edit/${postData.id}>
                <input type="button" value="修改文章" />
            </a>
            <button type="submit" class="btn btn-primary" id=${postData.id}>刪除文章</button>
            `
            nodeCreated.innerHTML = text
            postSection.append(nodeCreated)
        }
        const buttons = document.querySelectorAll(".btn")
        for (const button of buttons) {
            button.addEventListener('click', function(e) {
            fetch(`/ci-framework/api/posts/${button.id}`,{
                method: "DELETE",
                mode: 'same-origin',
            })
                .then((res)=>{
                    return res.json()
                })
                .then((json) => {
                    alert(json.message)
                    location.reload();
                })
          })
        }
    })


