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
const usersRef = dbRef.child("webusers");

const loginBtn = document.getElementById("login-btn");
loginBtn.addEventListener("click", goLogin);
console.log(window.location.origin + window.location.pathname);
function goLogin() {
	const loginUname = document.getElementById("login-username");
	const loginPwd = document.getElementById("login-password");
	const messageUI = document.getElementById("login-message");
	const messageS = document.getElementById("message-s");

	let username = loginUname.value;
	let password = CryptoJS.MD5(loginPwd.value);

	// console.log(username);
	// console.log(password.toString());

	usersRef.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				value = childSnap.val();
			if (username == value.username && password.toString() == value.password) {
				userkey = key;
				message = "Welcome";
				messageUI.innerHTML = message;
				hiddenui = '';
				hiddenui += '   <input type="hidden" name="username" id="username" class="form-control" value="">';
				hiddenui += '   <input type="hidden" name="role" id="role" class="form-control" value="">';
				hiddenui += '   <input type="hidden" name="kodepj" id="kodepj" class="form-control" value="">';
				hiddenui += '   <input type="hidden" name="namaloket" id="namaloket" class="form-control" value="">';
				$("#login-form").append(hiddenui);
				document.getElementById("userid").value = key;
				document.getElementById("username").value = value.username;
				document.getElementById("role").value = value.role;
				document.getElementById("kodepj").value = value.kodepj;
				document.getElementById("namaloket").value = value.namaloket;
				document.getElementById("login-form").submit();

				// $.ajax({
				// 	type: 'post',
				// 	url: window.location.origin + window.location.pathname +  'admin',
				// 	data: 'loggedin='+key,
				// 	success: function(response) {
				// 		alert(response)
				// 		location.href =
				// 		window.location.origin +
				// 		window.location.pathname +
				// 		"admin";
				// 	}
				// });
				// location.href =
				// 	window.location.origin +
				// 	window.location.pathname +
				// 	"admin?loggedin=" +
				// 	key;
				return true;
			}
			message = "Username atau Password Salah";
		});
		messageUI.innerHTML = message;
		console.log(message);
	});
}
