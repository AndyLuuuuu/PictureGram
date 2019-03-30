const showMenu = document.getElementById("showMenu");
const closeMenu = document.getElementById("closeMenu");
const dropdown = document.getElementById("dropdown");
const header = document.getElementById("headerContainer");
const logoH1 = document.getElementById("PGLogo");
const profileUserImages = document.getElementsByClassName("user_image");
const pageOverlay = document.getElementById("page_overlay");
const popupModal = document.getElementById("popup_modal");
const commentsDiv = document.getElementById("modal_post_comments");
const discoverUserImages = document.getElementsByClassName("discover_image");
const popupModalMoreOptions = document.getElementById(
  "popup_modal_more_options"
);
const popupModalMoreMenu = document.getElementById("popup_modal_more_menu");
const popupModalDeleteOption = document.getElementById("deletePost");
const popupModalEditOption = document.getElementById("editPost");

console.log(discoverUserImages);

var currentPhotoID = null;
var currentPhotoExt = null;

if (popupModalMoreMenu != undefined || popupModalMoreMenu != null) {
  console.log(popupModal.children[0].style);
  popupModalDeleteOption.addEventListener("click", () => {
    console.log(currentPhotoID);
    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
      if (xhr.status >= 200 && xhr.status < 300) {
        if (xhr.response === "SUCCESS") {
          location.reload();
        } else {
          alert("OH NO! Something went wrong :(");
        }
      }
    };
    var data = "postID=" + currentPhotoID + "&action=deletePost";
    xhr.open("POST", "../user_profile/user_actions.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);
  });

  popupModalEditOption.addEventListener("click", () => {
    location.replace(
      `../user_edit_post?postID=${currentPhotoID}&photoExt=${currentPhotoExt}`
    );
  });

  popupModalMoreOptions.addEventListener("click", () => {
    popupModalMoreMenu.classList.toggle("popup_modal_more_menu_show");
  });
}

pageOverlay.addEventListener("click", () => {
  popupModal.classList.remove("popup_modal_show");
  while (commentsDiv.firstChild) {
    commentsDiv.removeChild(commentsDiv.firstChild);
  }
  pageOverlay.style.display = "none";
  currentPhotoExt = null;
  currentPhotoID = null;
  popupModalMoreMenu.classList.toggle("popup_modal_more_menu_show");
});

// RETRIEVE COMMENTS FROM PHP CONNECTED TO PDO SQL DB
if (profileUserImages != null || profileUserImages != undefined) {
  for (var i = 0; i < profileUserImages.length; i++) {
    profileUserImages[i].addEventListener("click", event => {
      var dataset = event.target.dataset;
      currentPhotoID = dataset.photoid;
      currentPhotoExt = dataset.photoext;
      console.log(dataset);
      pageOverlay.style.display = "initial";
      popupModal.classList.add("popup_modal_show");
      popupModal.children[0].style.backgroundImage = `url('../FileServer/UserPostPhotos/${
        dataset["photoid"]
      }.${dataset["photoext"]}')`;
      popupModal.children[1].children[0].textContent = dataset.postname;
      popupModal.children[1].children[1].innerHTML = `<b>${
        dataset.accountname
      }</b> - ${dataset.postdesc}`;
      fetchComments(dataset.photoid);
    });
  }
}

function addDiscoverImageEvent() {
  for (var i = 0; i < discoverUserImages.length; i++) {
    discoverUserImages[i].addEventListener("click", event => {
      var dataset = event.target.dataset;
      currentPhotoID = dataset.photoid;
      console.log(event.target.dataset);
      pageOverlay.style.display = "initial";
      popupModal.classList.add("popup_modal_show");
      popupModal.children[0].style.backgroundImage = `url('../FileServer/UserPostPhotos/${
        dataset["photoid"]
      }.${dataset["photoext"]}')`;
      popupModal.children[1].children[0].textContent = dataset.postname;
      popupModal.children[1].children[1].innerHTML = `<b>${
        dataset.accountname
      }</b> - ${dataset.postdesc}`;
      fetchComments(dataset.photoid);
    });
  }
}

addDiscoverImageEvent();

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
      commentsDiv.appendChild(fragment);
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
if (showMenu != null || showMenu != undefined) {
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
}

window.addEventListener("scroll", () => {
  var middle =
    (document.documentElement.scrollHeight -
      document.documentElement.clientHeight) *
    0.9;
  if (window.pageYOffset > middle) {
    var xhr = new XMLHttpRequest();
    xhr.onload = () => {
      if (xhr.status >= 200 && xhr.status < 300) {
        console.log(JSON.parse(xhr.response));
        JSON.parse(xhr.response).map(post => {
          var discoverImageContainer = document.createElement("div");
          discoverImageContainer.className = "discover_image_container";
          var discoverImage = document.createElement("img");
          discoverImage.className = "discover_image";
          discoverImage.dataset["accountname"] = post.accountName;
          discoverImage.dataset["photoid"] = post.postID;
          discoverImage.dataset["photoext"] = post.postImageExt;
          discoverImage.dataset["postname"] = post.postName;
          discoverImage.dataset["postdesc"] = post.postDesc;
          discoverImage.src = `../FileServer/UserPostPhotos/${post.postID}.${
            post.postImageExt
          }`;
          document
            .getElementById("discover_images")
            .append(discoverImageContainer);
          discoverImageContainer.append(discoverImage);
        });
        addDiscoverImageEvent();
      }
    };
    var data = "offset=" + discoverUserImages.length + "&action=fetchPosts";
    xhr.open("POST", "../user_discover/user_actions.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);
  }
});

// MAX SCROLL Y
console.log(
  document.documentElement.scrollHeight - document.documentElement.clientHeight
);
