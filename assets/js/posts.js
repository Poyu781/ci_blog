const postSection = document.querySelector(".post__section")

fetch(`/ci-framework/api/posts`)
	.then((response) => {
		return response.json();
	})
	.then((postsData) => {
		commentsLen = postsData.length
		for (let i = 0; i < commentsLen; i++) {
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
            
            `
			nodeCreated.innerHTML = text
			postSection.append(nodeCreated)
		}

	});
