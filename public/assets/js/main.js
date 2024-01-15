
class main {
    __constructor() {
        this.fetchData;
    }
    fetchData() {
        this.register = document.getElementsByClassName('register');
    }
    validation() {
        const form = document.getElementById('register');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
        
            if (validateForm()) {
                form.submit();
            } else {
                
            }
        });
    }
    isValidForm() {
        const fname = document.getElementById('fname').value.trim();
        const lname = document.getElementById('lname').value.trim();
        const email = document.getElementById('email').value.trim();
        const pass = document.getElementById('pass').value.trim();
        const conPass = document.getElementById('conPass').value.trim();
        const error = document.getElementById('error');

        const inputs = [fname, lname, email, pass, conPass];

        for(const input of inputs) {
            if(input === '') {
                error.innerText('Please Fill All Inputs!');
                return false;
            }
        }
    }
}