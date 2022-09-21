const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('pwd');


form.addEventListener('submit', e => {
    // e.preventDefault();

    var isValid = validateInput();
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

const validateInput = () => {
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();

    let jsonObj = {"emailStatus":false, "pwStatus":false,}; //initialize to all false at first

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

            //check validation
            var valuesArr = Object.values(jsonObj); //create array from one level json object, after all validations and reassigment of booleans
            //initialize passCheckBool to initially true
            var passCheckBool = true;
            if(valuesArr.includes(false)){
                var passCheckBool = false;
            } //change passCheckBool to false if contains false element in valuesArr
            return passCheckBool;
};
