const showMenu = document.getElementById("showMenu");
const closeMenu = document.getElementById("closeMenu");
const dropdown = document.getElementById("dropdown");
const header = document.getElementById("headerContainer");
const logoH1 = document.getElementById("PGLogo");
const userImages = document.getElementsByClassName("user_image_overlay");
const pageOverlay = document.getElementById("page_overlay");
const popupModal = document.getElementById("popup_modal");
const commentsDiv = document.getElementById("modal_post_comments");

var currentPhotoID = null;

pageOverlay.addEventListener("click", () => {
  popupModal.classList.remove("popup_modal_show");
  while (commentsDiv.firstChild) {
    commentsDiv.removeChild(commentsDiv.firstChild);
  }
  pageOverlay.style.display = "none";
});

// RETRIEVE COMMENTS FROM PHP CONNECTED TO PDO SQL DB
for (var i = 0; i < userImages.length; i++) {
  userImages[i].addEventListener("click", event => {
    var dataset = event.target.dataset;
    currentPhotoID = dataset.photoid;
    console.log(dataset);
    pageOverlay.style.display = "initial";
    popupModal.classList.add("popup_modal_show");
    popupModal.children[0].children[0].textContent = dataset.postname;
    popupModal.children[0].children[1].textContent = `Posted by: ${
      dataset.accountname
    }`;
    popupModal.children[1].style.backgroundImage = `url('../FileServer/UserPostPhotos/${
      dataset["photoid"]
    }.${dataset["photoext"]}')`;
    popupModal.children[2].children[0].textContent = dataset.postdesc;
    fetchComments(dataset.photoid);
  });
}

function fetchComments(photoid) {
  var xhr = new XMLHttpRequest();
  xhr.onload = () => {
    if (xhr.status >= 200 && xhr.status < 300) {
      const fragment = document.createDocumentFragment();
      var commentDiv;
      var content;
      var date;
      while (commentsDiv.firstChild) {
        commentsDiv.removeChild(commentsDiv.firstChild);
      }
      JSON.parse(xhr.response).map(comment => {
        commentDiv = document.createElement("div");
        commentDiv.className = "comment";
        content = document.createElement("p");
        content.className = "comment_content";
        content.innerHTML = `<b>${comment.accountName}</b> - ${
          comment.comment
        }`;
        date = document.createElement("p");
        date.className = "comment_date";
        date.innerText = comment.datePosted;
        commentDiv.appendChild(content);
        commentDiv.appendChild(date);
        fragment.appendChild(commentDiv);
      });
    } else {
      alert("Oh no! Something went wrong!");
    }
  };
  var data = "postID=" + photoid + "&action=retrieveComments";
  xhr.open("POST", "../user_profile/user_actions.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(data);
}

function postComment() {
  var accountID = document.getElementById("current_user").value;
  var comment = document.getElementById("comment_input").value;
  var postID = currentPhotoID;
  if (comment === null || comment.length <= 0 || comment === "") {
    alert("Please enter your comment!");
  } else {
    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
      if (xhr.status >= 200 && xhr.status < 300) {
        if (xhr.response === "SUCCESS") {
          document.getElementById("comment_input").value = "";
          fetchComments(currentPhotoID);
        }
      } else {
        document.getElementById("comment_input").value = "";
        alert("Oh no! Something went wrong!");
      }
    };
    var data =
      "accountID=" +
      accountID +
      "&postID=" +
      postID +
      "&comment=" +
      comment +
      "&action=postComment";
    xhr.open("POST", "../user_profile/user_actions.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);
  }
}

showMenu.addEventListener("click", () => {
  header.classList.toggle("toggleHeader");
  logoH1.classList.toggle("toggleLogo");
  showMenu.classList.toggle("invisible");
  closeMenu.classList.toggle("visible");
  dropdown.style.zIndex = 50;
  dropdown.style.opacity = 1;
});

closeMenu.addEventListener("click", () => {
  console.log("clicked");
  header.classList.toggle("toggleHeader");
  logoH1.classList.toggle("toggleLogo");
  showMenu.classList.toggle("invisible");
  closeMenu.classList.toggle("visible");
  dropdown.style.opacity = 0;
  dropdown.style.zIndex = -50;
});
