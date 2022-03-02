import * as Validator from "validatorjs";

function validateInput(input) {
    let rules = {
        name: "required|string",
        lastname: "required|string",
        email: [
            "required",
            "email",
            "regex: ^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$",
        ],
        birth: "required",
        phoneNumber: "required|numeric",
        mobileNumber: "numeric",
        nation: ["string"],
        fiscal_code: ["required", "string"],
        cap: ["required", "numeric"],
        address: "required|string",
        city: "required|string",
        sex: "required|string",
        zip: "required|numeric",
    };

    let messages = {
        "required.email": "L'email è un campo obbligatorio",
        "regex.email": "L'email non è valida",
        "required.name": "Il nome è un campo obbligatorio",
        "required.citta": "Città è un campo obbligatorio",
        "required.cap": "Il cap è un campo obbligatorio",
        "required.address": "L'indirizzo è un campo obbligatorio",
        "required.fiscal_code":
            "Il codice fiscale è un campo obbligatorio",
        "required.phoneNumber":
            "Il numero di telefono è un campo obbligatorio",
        "required.lastname": "Il cognome è un campo obbligatorio",
        "string.name":
            "Il nome deve essere un campo contenente solo testo",
        "string.lastname":
            "Il cognome deve essere un campo contenente solo testo",
        "string.nation":
            "La nazione deve essere un campo contenente solo testo",
        "string.city":
            "La città deve essere un campo contenente solo testo",
        "numeric.mobileNumber":
            "Il numero mobile deve essere un campo numerico (niente testo)",
        "numeric.phoneNumber":
            "Il numero di telefono deve essere un campo numerico (niente testo)",
        "required.birth":
            "La data di nascita è un campo obbligatorio",
        "required.sex" :
            "Specificare il sesso del paziente",
        "required.zip" :
            "Specificare il CAP",
        "numeric.zip" :
            "Il CAP deve essere un campo numerico"
    };

    let validation = new Validator(input, rules, messages);

    return validation;
};

function getFormData() {
    let input = {};
    input.name = document.getElementById("name").value;
    input.lastname = document.getElementById("lastname").value;
    input.email = document.getElementById("emailAddress").value;
    input.phoneNumber = document.getElementById("phoneNumber").value;
    input.mobileNumber = document.getElementById("mobilePhone").value;
    input.nation = document.getElementById("inputNation").value;
    input.fiscal_code = document.getElementById("CF").value;
    input.cap = document.getElementById("inputZip").value;
    input.address = document.getElementById("inputAddress").value;
    input.city = document.getElementById("inputCity").value;
    input.birth = document.getElementById("datebirth").value;
    input.sex = document.getElementById("sesso").value;
    input.zip = document.getElementById("inputZip").value

    //console.log(input.city + input.birth);

    return input;
};


export{
    getFormData,
    validateInput,
}
