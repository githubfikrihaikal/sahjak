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
url = window.location.pathname.split("/");
id = url[4];
// Firebase Database Reference and the child
const dbRef = firebase.database().ref();
const usersRef = dbRef.child("lokasi/" + id + "/layanan");
var red = true;
if (red == true) {
	read();
	readpj();
}

function read() {
	document.getElementById("tablebody").innerHTML = "";
	var content = "";
	var no = 1;
	usersRef.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			content += "<tr>";
			content += "<td>" + no + "</td>";
			no++;
			content += "<td>" + val.id + "</td>";
			content += "<td>" + val.nama + "</td>";
			content += "<td>" + val.antri_total + "</td>";
			content += "<td>" + val.panggil_antrian.nomor_antri + "</td>";
			content +=
				'<td> <button type="button" class="btn btn-success next" data-key="' +
				key +
				'">Next</button> <button type="button" class="btn btn-danger skip" data-key="' +
				key +
				'">Skip</button> <button type="button" class="btn btn-info recall" data-key="' +
				key +
				'">Recall</button> <button type="button" class="btn btn-primary recallto" data-key="' +
				key +
				'">Recall To</button> <button type="button" class="btn btn-warning setpj" data-key="' +
				key +
				'">Atur PJ</button> </td>';
			content += "</tr>";
		});
		document.getElementById("tablebody").innerHTML = "";
		$("#tabel").append(content);
		$(".next").on("click", goNext);
		$(".skip").on("click", goSkip);
		$(".recall").on("click", goRecall);
		$(".recallto").on("click", goRecallTo);
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
		console.log(id);
		var namaloket;
		const userRef = dbRef.child("webusers/" + fruit);
		const userRef2 = dbRef.child("lokasi/" + id + "/layanan/"+userID);
		userRef2.on("value", snap => {
			namaloket = snap.val().nama;
		});
		newPegawai = {};
		newPegawai['namaloket'] = namaloket;
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

function goSkip(e) {
	Swal.fire({
		title: "Skip?",
		text: "Melakukan Skip pada nomor antrian ini?",
		icon: "warning",
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "OK!"
	}).then(result => {
		if (result.value) {
			document.getElementById("tablebody").innerHTML = "";
			var id2 = e.target.getAttribute("data-key");
			const skip = dbRef.child("lokasi/" + id + "/layanan/" + id2 + "/skipped");
			const skip_antrian = dbRef.child("lokasi/" + id + "/layanan/" + id2);
			skipped = {};
			index = 0;
			skip.on("value", snap => {
				snap.forEach(childSnap => {
					let key = childSnap.key,
						val = childSnap.val();
					skipped["skip" + index] = val;
					index++;
				});
			});
			skip_antrian.on("value", snap => {
				snap.forEach(childSnap => {
					let key = childSnap.key,
						val = childSnap.val();
					if (key == "panggil_antrian") {
						skipped["skip" + index] = val.nomor_antri;
						index++;
					}
				});
			});
			//console.log(skipped);
			skip.update(skipped);
			read();
			Next(e);
		}
	});
}

function goRecall(e) {
	var nomorantri = 0;
	var namaloket = "";
	var id2 = e.target.getAttribute("data-key");
	const usersRef2 = dbRef.child("lokasi/" + id + "/layanan/" + id2);
	usersRef2.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			if (key == "nama") {
				namaloket = val;
			}
			if (key == "panggil_antrian") {
				nomorantri = val.nomor_antri;
			}
		});
		Swal.fire(
			"Panggilan pada loket " + namaloket,
			"Nomor antrian ke-" + nomorantri,
			"warning"
		);
	});
}

function gorecallTo(e) {}

function goNext(e) {
	Swal.fire({
		title: "Next?",
		text: "Melakukan Next ke Antrian Selanjutnya?",
		icon: "warning",
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "OK!"
	}).then(result => {
		if (result.value) {
			Next(e);
			panggilAntrian(e);
			checkSkip(e);
			read();
		}
	});
}

function Next(e) {
	document.getElementById("tablebody").innerHTML = "";
	var id2 = e.target.getAttribute("data-key");
	const antrian = dbRef.child(
		"lokasi/" + id + "/layanan/" + id2 + "/panggil_antrian"
	);
	var next = {};
	antrian.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			if (key == "nomor_antri") {
				next[key] = val + 1;
			} else {
				next[key] = val;
			}
		});
	});
	antrian.update(next);
	read();
}

function panggilAntrian(e) {
	var id2 = e.target.getAttribute("data-key");
	const usersRef2 = dbRef.child(
		"lokasi/" + id + "/layanan/" + id2 + "/panggil_antrian"
	);
	usersRef2.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			if (key == "nomor_antri") {
				nomorantri = val;
			}
		});
		Swal.fire(
			"Panggilan pada loket",
			"Nomor antrian ke-" + nomorantri,
			"warning"
		);
	});
}

function checkSkip(e) {
	var id2 = e.target.getAttribute("data-key");
	const skip = dbRef.child("lokasi/" + id + "/layanan/" + id2 + "/skipped");
	const skip_antrian = dbRef.child("lokasi/" + id + "/layanan/" + id2);
	var skipped = {};
	var index = 0;
	var nomorskrg;
	skip_antrian.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			if (key == "panggil_antrian") {
				nomorskrg = val.nomor_antri;
			}
		});
	});
	skip.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();
			console.log(val);
			if (val > nomorskrg - 5) {
				skipped["skip" + index] = val;
				index++;
			}
		});
	});
	// /console.log(skipped);
	skip.remove();
	skip.update(skipped);
	read();
}

async function goTambah() {
	const { value: formValues } = await Swal.fire({
		title: "Tambah KPP",
		html:
			'<input autocomplete="off" name="hidden" type="text" style="display:none;">' +
			'<input id="swal-input1" class="swal2-input pegawai-input" data-key="id" placeholder="ID Antrian" autocomplete="off">' +
			'<input id="swal-input2" class="swal2-input pegawai-input" data-key="nama" placeholder="Nama Loket" autocomplete="off">' +
			'<input id="swal-input3" class="swal2-input pegawai-input" data-key="antri_total" placeholder="Total Antrian" autocomplete="off">',
		//   '<input id="swal-input1" class="swal2-input pegawai-input" data-key="role" placeholder="Role" autocomplete="off">',
		focusConfirm: false,
		showCancelButton: true,
		preConfirm: () => {
			return [];
		}
	});

	if (formValues) {
		document.getElementById("tablebody").innerHTML = "";
		const usersRef = dbRef.child("lokasi/" + id + "/layanan");
		const addUserInputsUI = document.getElementsByClassName("pegawai-input");
		let newPegawai = {};
		var empty = false;
		for (let i = 0, len = addUserInputsUI.length; i < len; i++) {
			if (addUserInputsUI[i].value != "") {
				let key = addUserInputsUI[i].getAttribute("data-key");
				let value = addUserInputsUI[i].value;
				newPegawai[key] = value;
			} else {
				empty = true;
			}
		}
		if (empty == true) {
			Swal.fire("Gagal!", "Gagal menambah data", "error");
			read();
		} else {
			panggil_antrian = { nomor_antri: 1 };
			newPegawai["panggil_antrian"] = panggil_antrian;
			usersRef.push(newPegawai);
			Swal.fire("Berhasil!", "Berhasil menambah data", "success");
			read();
		}
	}
}

pjdata = {};
function readrecall(e) {
	var id2 = e.target.getAttribute("data-key");
	const skip = dbRef.child("lokasi/" + id + "/layanan/" + id2 + "/skipped");
	skip.on("value", snap => {
		snap.forEach(childSnap => {
			let key = childSnap.key,
				val = childSnap.val();

			pjdata[key] = val;
		});
	});
}

async function goRecallTo(e) {
	readrecall(e);
	const { value: fruit } = await Swal.fire({
		title: "Recall To:",
		input: "select",
		inputOptions: pjdata,
		inputPlaceholder: "Pilih Antrian",
		showCancelButton: true,
		inputValidator: value => {
			return new Promise(resolve => {
				if (value == "") {
					resolve("pilih salah satu");
				} else {
					resolve();
				}
			});
		}
	});

	if (fruit) {
		nomorantrian = 0;
		var id2 = e.target.getAttribute("data-key");
		const skip = dbRef.child("lokasi/" + id + "/layanan/" + id2 + "/skipped");
		skip.on("value", snap => {
			snap.forEach(childSnap => {
				let key = childSnap.key,
					val = childSnap.val();
				if (key == fruit) {
					nomorantrian = val;
				}
			});
		});
		Swal.fire(
			"Panggilan pada loket",
			"Nomor antrian ke-" + nomorantrian,
			"warning"
		);
		read();
	}
}
