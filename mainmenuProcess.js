function displayPost() {
  document.body.addEventListener("click", displayPost());
  var postButton = document.getElementById("mainBody");
  var formElement = document.createElement("form");
  var labelElement = document.createElement("label");
  var inputElement = document.createElement("input");
  var searchLabel = document.createTextNode("Search for an article ");
  labelElement.appendChild(searchLabel);

  postButton.appendChild(formElement);
  postButton.appendChild(labelElement);
  postButton.appendChild(inputElement);
}
function displaySearch() {}
function displayAccount() {}
function displayLogout() {}
function reset() {}
