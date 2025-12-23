function verifierForm() {
    let email = document.querySelector("input[name='email']").value;

    if (email === "") {
        alert("Email obligatoire");
        return false;
    }

    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(email)) {
        alert("Email invalide");
        return false;
    }

    return true;
}
