
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
                form.submit(); // If you want to proceed with the form submission
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

        const inputs = [fname, lname, email, pass, conPass];

        for(const input of inputs) {
            if(input === '') {

            }
        }
    }
}