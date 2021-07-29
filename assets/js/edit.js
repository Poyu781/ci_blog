const url = window.location.pathname;
const postId = url.split('/')[4]
const bodySection = document.querySelector("#editor1")
const titleSection = document.querySelector("input[name=title]")
const idSection = document.querySelector("input[name=id]")
if (postId) {
	idSection.value = postId
	fetch(`/ci-framework/api/posts/${postId}`)
		.then((response) => {
			return response.json();
		})
		.then((postData) => {
			postData = postData[0]
			titleSection.value = postData.title

			setTimeout(() => {
				CKEDITOR.instances['editor1'].setData(postData.body)
			}, 300);


		});
}
