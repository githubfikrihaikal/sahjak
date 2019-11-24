// !IMPORTANT: REPLACE WITH YOUR OWN CONFIG OBJECT BELOW

// Initialize Firebase
var config = {
	apiKey: "AIzaSyDz8QNDp9Vwwp50ruGT_HSo0i-Qw0Zd6Zk",
	authDomain: "progam-penguasa-dunia.firebaseapp.com",
	databaseURL: "https://progam-penguasa-dunia.firebaseio.com",
	projectId: "progam-penguasa-dunia",
	storageBucket: "progam-penguasa-dunia.appspot.com",
	messagingSenderId: "597134493035",
	appId: "1:597134493035:web:eb81ebbef0c893ab96782e",
	measurementId: "G-1HDY643ED0"
};

firebase.initializeApp(config);

// Firebase Database Reference and the child
const dbRef = firebase.database().ref();

readUserData();

// --------------------------
// READ
// --------------------------
function readUserData() {
	const userListUI = document.getElementById("user-list");

	const usersRef = dbRef.child("webusers");

	usersRef.on("value", snap => {
		userListUI.innerHTML = "";

		snap.forEach(childSnap => {
			let key = childSnap.key,
				value = childSnap.val();

			let $li = document.createElement("li");

			// edit icon
			let editIconUI = document.createElement("span");
			editIconUI.class = "edit-user";
			editIconUI.innerHTML = " ✎";
			editIconUI.setAttribute("userid", key);
			editIconUI.addEventListener("click", editButtonClicked);

			// delete icon
			let deleteIconUI = document.createElement("span");
			deleteIconUI.class = "delete-user";
			deleteIconUI.innerHTML = " ☓";
			deleteIconUI.setAttribute("userid", key);
			deleteIconUI.addEventListener("click", deleteButtonClicked);

			$li.innerHTML = value.username;
			$li.append(editIconUI);
			$li.append(deleteIconUI);

			$li.setAttribute("user-key", key);
			$li.addEventListener("click", userClicked);
			userListUI.append($li);
		});
	});
}

function userClicked(e) {
	var userID = e.target.getAttribute("user-key");

	const userRef = dbRef.child("webusers/" + userID);
	const userDetailUI = document.getElementById("user-detail");

	userRef.on("value", snap => {
		userDetailUI.innerHTML = "";

		snap.forEach(childSnap => {
			var $p = document.createElement("p");
			$p.innerHTML = childSnap.key + " - " + childSnap.val();
			userDetailUI.append($p);
		});
	});
}

// --------------------------
// ADD
// --------------------------

const addUserBtnUI = document.getElementById("add-user-btn");
addUserBtnUI.addEventListener("click", addUserBtnClicked);

function addUserBtnClicked() {
	const usersRef = dbRef.child("webusers");

	const addUserInputsUI = document.getElementsByClassName("user-input");

	// this object will hold the new user information
	let newUser = {};

	// loop through View to get the data for the model
	for (let i = 0, len = addUserInputsUI.length; i < len; i++) {
		let key = addUserInputsUI[i].getAttribute("data-key");
		let value = addUserInputsUI[i].value;
		if (key == "password") {
			value = CryptoJS.MD5(value).toString();
		}
		newUser[key] = value;
	}

	usersRef.push(newUser);
}

const addpegawaiBtnUI = document.getElementById("add-pegawai-btn");
addpegawaiBtnUI.addEventListener("click", addpegawaiBtnClicked);

function addpegawaiBtnClicked() {
	const pegawaisRef = dbRef.child("pegawai");

	const addpegawaiInputsUI = document.getElementsByClassName("pegawai-input");

	// this object will hold the new pegawai information
	let newpegawai = {};

	// loop through View to get the data for the model
	for (let i = 0, len = addpegawaiInputsUI.length; i < len; i++) {
		let key = addpegawaiInputsUI[i].getAttribute("data-key");
		let value = addpegawaiInputsUI[i].value;
		if (key == "password") {
			value = CryptoJS.MD5(value).toString();
		}
		newpegawai[key] = value;
	}

	pegawaisRef.push(newpegawai);
}

// --------------------------
// DELETE
// --------------------------
function deleteButtonClicked(e) {
	e.stopPropagation();

	var userID = e.target.getAttribute("userid");
	console.log(userID);

	const userRef = dbRef.child("webusers/" + userID);

	userRef.remove();
}

// --------------------------
// EDIT
// --------------------------
function editButtonClicked(e) {
	document.getElementById("edit-user-module").style.display = "block";

	//set user id to the hidden input field
	document.querySelector(".edit-userid").value = e.target.getAttribute(
		"userid"
	);

	const userRef = dbRef.child("users/" + e.target.getAttribute("userid"));

	// set data to the user field
	const editUserInputsUI = document.querySelectorAll(".edit-user-input");

	userRef.on("value", snap => {
		for (var i = 0, len = editUserInputsUI.length; i < len; i++) {
			var key = editUserInputsUI[i].getAttribute("data-key");
			editUserInputsUI[i].value = snap.val()[key];
		}
	});

	const saveBtn = document.querySelector("#edit-user-btn");
	saveBtn.addEventListener("click", saveUserBtnClicked);
}

function saveUserBtnClicked(e) {
	const userID = document.querySelector(".edit-userid").value;
	const userRef = dbRef.child("users/" + userID);

	var editedUserObject = {};

	const editUserInputsUI = document.querySelectorAll(".edit-user-input");

	editUserInputsUI.forEach(function(textField) {
		let key = textField.getAttribute("data-key");
		let value = textField.value;
		editedUserObject[textField.getAttribute("data-key")] = textField.value;
	});

	userRef.update(editedUserObject);

	document.getElementById("edit-user-module").style.display = "none";
}
