const inputName = document.querySelector("input[name='name']");
const inputDateOfBirth = document.querySelector("input[name='dateOfBirth']");
const inputGender = document.querySelector("input[name='gender']");
const inputMark = document.querySelector("input[name='mark']");

const button = document.getElementById("button");
button.classList.add("disabled");
button.disabled = true;

let name, dateOfBirth, gender, mark;
function check() {
	if (
		name != null &&
		name != "" &&
		dateOfBirth != null &&
		dateOfBirth != "" &&
		gender != null &&
		gender != "" &&
		mark != null &&
		mark != ""
	) {
		button.classList.remove("disabled");
		button.disabled = false;
		console.log("true");
	} else {
		button.classList.add("disabled");
		button.disabled = true;
	}
}

inputName.addEventListener("change", function () {
	name = inputName.value;
	check();
});
inputDateOfBirth.addEventListener("change", function () {
	dateOfBirth = inputDateOfBirth.value;
	check();
});
inputGender.addEventListener("change", function () {
	gender = inputGender.value;
	check();
});
inputMark.addEventListener("change", function () {
	mark = inputMark.value;
	check();
});
