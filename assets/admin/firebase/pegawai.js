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

readkaryawan();

function readkaryawan() {
	document.getElementById("tablebody").innerHTML = "";
	// console.log(username);
	// console.log(password.toString());
	var content = "";
	var no = 1;
	usersRef.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			if(val.role == 'pegawai'){
				content += "<tr>";
				content += "<td>" + no + "</td>";
				no++;
				content += "<td>" + val.username + "</td>";
				content += "<td>" + val.kodepj + "</td>";
				content +=
					'<td> <button type="button" class="btn btn-danger delete" data-key="' + key +'">Delete</button>' +
					' <button type="button" class="btn btn-info edit" data-key="' + key + '">Edit</button> </td>';
				content += "</tr>";
			}
		});
		$("#tabel").append(content);
		$(".delete").on("click", godelete);
		$(".edit").on("click", goedit);
	});
}

async function goTambah() {
	const { value: formValues } = await Swal.fire({
		title: "Tambah Pegawai",
		html:
			'<input autocomplete="off" name="hidden" type="text" style="display:none;">' +
			'<input id="swal-input1" class="swal2-input pegawai-input" data-key="username" placeholder="Username" autocomplete="off">' +
			'<input id="swal-input2" class="swal2-input pegawai-input" data-key="password" placeholder="Password" type="password" autocomplete="off">',
		//   '<input id="swal-input1" class="swal2-input pegawai-input" data-key="role" placeholder="Role" autocomplete="off">',
		focusConfirm: false,
		showCancelButton: true,
		preConfirm: () => {
			return [];
		}
	});

	if (formValues) {
		document.getElementById("tablebody").innerHTML = "";
		const usersRef = dbRef.child("webusers");
		const addUserInputsUI = document.getElementsByClassName("pegawai-input");
		let newPegawai = {};
		var empty = false;
		for (let i = 0, len = addUserInputsUI.length; i < len; i++) {
			if (addUserInputsUI[i].value != "") {
				let key = addUserInputsUI[i].getAttribute("data-key");
				let value = addUserInputsUI[i].value;
				if (key == "password") {
					value = CryptoJS.MD5(value).toString();
				}
				newPegawai[key] = value;
			} else {
				empty = true
			}
		}
		if(empty == true){
			Swal.fire("Gagal!", "Gagal menambah data", "error");
			readkaryawan();
		}else{
			newPegawai['role'] = 'pegawai';
			newPegawai['kodepj'] = '0';
			usersRef.push(newPegawai);
			Swal.fire("Berhasil!", "Berhasil menambah data", "success");
			readkaryawan();
		}

	}
}

function godelete(e) {
	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data yang didelete tidak dapat dikembalikan",
		icon: "question",
		showCancelButton: true,
		reverseButtons: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "OK!"
	}).then(result => {
		if (result.value) {
			var userID = e.target.getAttribute("data-key");
			const userRef = dbRef.child("webusers/" + userID);
			userRef.remove();
			Swal.fire("Berhasil!", "Data berhasil dihapus", "success");
			readkaryawan();
		}
	});
}

async function goedit(e){
	const userRef = dbRef.child("webusers/" + e.target.getAttribute("data-key"));
	var html = '';
	var oldpw = '';
	userRef.on("value", snap => {
		html += '<input id="swal-input1" class="swal2-input pegawai-input" data-key="username" placeholder="Username" autocomplete="off" value="'+snap.val()['username']+'">';
		html += '<input id="swal-input2" class="swal2-input pegawai-input" data-key="password" placeholder="Password (Kosongkan jika tidak ganti password)" type="password" autocomplete="off"" value=""> ';
		oldpw = snap.val()['password'];
	});
	const { value: formValues } = await Swal.fire({
		title: "Edit Pegawai",
		html: html,
		focusConfirm: false,
		preConfirm: () => {
			return [];
		}
	});
	if (formValues) {
		document.getElementById("tablebody").innerHTML = "";
		const addUserInputsUI = document.getElementsByClassName("pegawai-input");
		let newPegawai = {};
		var empty = false;
		for (let i = 0, len = addUserInputsUI.length; i < len; i++) {
			let key = addUserInputsUI[i].getAttribute("data-key");
			if (addUserInputsUI[i].value != "") {
				let value = addUserInputsUI[i].value;
				if (key == "password") {
					value = CryptoJS.MD5(value).toString();
				}
				newPegawai[key] = value;
			} else {
				if(key == 'password'){
					newPegawai['password'] = oldpw;
				}else{
					empty = true
				}
			}
		}
		if(empty == true){
			Swal.fire("Gagal!", "Gagal menambah data", "error");
			readkaryawan();
		}else{
			userRef.update(newPegawai);
			Swal.fire("Berhasil!", "Berhasil mengubah data", "success");
			readkaryawan();
		}
	}
}
