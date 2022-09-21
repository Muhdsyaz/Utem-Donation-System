const form = document.getElementById('form');
const fullname = document.getElementById('fname');
const phoneNum = document.getElementById('phone');
const email = document.getElementById('email');
const password = document.getElementById('pwd');
const password2 = document.getElementById('confirmpwd');

form.addEventListener('submit', e => {
    // e.preventDefault();

    var isValid = validateInputs();
    if (!isValid) {
        e.preventDefault();
       return;
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const fullnameValue = fullname.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const phoneValue = phoneNum.value.trim();

    let jsonObj = {"fnameStatus":false, "emailStatus":false, "pwStatus":false, "pw2Status":false,
    "phoneStatus":false
}; //initialize to all false at first

    if(fullnameValue === '') {
        setError(fullname, 'Name is required');
    } else {
        setSuccess(fname);
        jsonObj['fnameStatus'] = true; //reassign to true
    }

    if(phoneValue === '') {
        setError(phoneNum, 'Phone number is required');
    }else if(phoneValue.length < 10 || phoneValue.length > 11 ) {
        setError(phoneNum, 'Invalid phone number is entered');
    }else {
        setSuccess(phoneNum);
        jsonObj['phoneStatus'] = true; //reassign to true
    }

    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
        jsonObj['emailStatus'] = true; //reassign to true
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
        jsonObj['pwStatus'] = true; //reassign to true
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
    } else {
        setSuccess(password2);
        jsonObj['pw2Status'] = true; //reassign to true
    }

        //check validation
        var valuesArr = Object.values(jsonObj); 
        //create array from one level json object, after all validations and reassigment of booleans
        //initialize passCheckBool to initially true
        var passCheckBool = true;
        if(valuesArr.includes(false)){
            var passCheckBool = false;
        } //change passCheckBool to false if contains false element in valuesArr
        return passCheckBool;
};
