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
const usersRef = dbRef.child("lokasi/1/loket");
var pjdata = {};

read();
readpj();

function read() {
	document.getElementById("tablebody").innerHTML = "";
	// console.log(username);
	// console.log(password.toString());
	var content = "";
	var no = 1;
	usersRef.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			content += "<tr>";
			content += "<td>" + no + "</td>";
			no++;
			if(val.pj == null){
				val.pj = 'Masih belum diset'
			}
			content += '<td align="center">' + val.namaloket + "</td>";
			content += '<td align="center">' + val.pj + "</td>";
			content +=
				'<td align="center"> '+
				' <button type="button" class="btn btn-danger delete" data-key="' + key +'">Delete</button> '+
				' <button type="button" class="btn btn-info detail" data-key="' + key +'" data-name="'+ val.namaloket +'">Detail</button>'+
				' <button type="button" class="btn btn-primary setpj" data-key="' + key +'">Set PJ</button> </td>',
			content += "</tr>";
		});
		$("#tabel").append(content);
		$(".detail").on("click", getdetail);
		$(".delete").on("click", godelete);
		$(".setpj").on("click", setpj);
	});
}

function readpj(){
	const usersRef = dbRef.child("webusers");
	usersRef.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			if(val.role == 'pegawai'){
				pjdata[key] = val.username;
			}
		});
	});
}

function getdetail(e) {
	console.log(e);
	var id = e.target.getAttribute("data-key");
	var nama = e.target.getAttribute("data-name")
	location.href = "detail_layanan/";
}

function godelete(e){
	console.log(e.target.getAttribute("data-key"))
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
			const userRef = dbRef.child("lokasi/1/loket/" + userID);
			userRef.remove();
			Swal.fire("Berhasil!", "Data berhasil dihapus", "success");
			read();
		}
	});
}

async function setpj(e){
	const { value: fruit } = await Swal.fire({
		title: 'Pilih PJ',
		input: 'select',
		inputOptions: pjdata,
		inputPlaceholder: 'Pilih PJ',
		showCancelButton: true,
		inputValidator: (value) => {
		  return new Promise((resolve) => {
			if(value == ''){
				resolve('pilih salah satu');
			}else{
				resolve()

			}
		  })
		}
	  })
	  
	  if (fruit) {
		var userID = e.target.getAttribute("data-key");
		var namaloket;
		var key;
		console.log(fruit)
		const userRef = dbRef.child("webusers/" + fruit);
		const userRef2 = dbRef.child("lokasi/1/loket/"+userID);
		userRef2.on("value", snap => {
			namaloket = snap.val().namaloket;
			key = snap.key;
		
		});
		console.log(key)
		console.log(namaloket)
		newPegawai = {};
		newPegawai['namaloket'] = namaloket;
		newPegawai['kodepj'] = key;
		userRef.update(newPegawai);

		newPegawai2 = {};
		userRef.on("value", snap => {
			snap.forEach(childSnap => {
				let key = childSnap.key,
					val = childSnap.val();
				if(key == 'username'){
					newPegawai2['pj'] = val;
				}
			});
		});

		//const userRef2 = dbRef.child("lokasi/" + userID);
		userRef2.update(newPegawai2);
		read();
	  }
}



async function goTambah() {
	const { value: formValues } = await Swal.fire({
		title: "Tambah Loket",
		html:
			'<input autocomplete="off" name="hidden" type="text" style="display:none;">' +
			'<input id="swal-input1" class="swal2-input pegawai-input" data-key="namaloket" placeholder="Nama Loket" autocomplete="off">',
		focusConfirm: false,
		showCancelButton: true,
		preConfirm: () => {
			return [];
		}
	});

	if (formValues) {
		document.getElementById("tablebody").innerHTML = "";
		const usersRef = dbRef.child("lokasi/1/loket");
		const addUserInputsUI = document.getElementsByClassName("pegawai-input");
		let newPegawai = {};
		var empty = false;
		for (let i = 0, len = addUserInputsUI.length; i < len; i++) {
			if (addUserInputsUI[i].value != "") {
				let key = addUserInputsUI[i].getAttribute("data-key");
				let value = addUserInputsUI[i].value;
				newPegawai[key] = value;
			} else {
				empty = true
			}
		}
		if(empty == true){
			Swal.fire("Gagal!", "Gagal menambah data", "error");
			read();
		}else{
			usersRef.push(newPegawai);
			Swal.fire("Berhasil!", "Berhasil menambah data", "success");
			read();
		}

	}
}