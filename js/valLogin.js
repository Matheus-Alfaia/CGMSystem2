const init = () => {
	const validateLogin = (event) => {
		const input = event.currentTarget
	}

	const inputLogin = document.querySelector('input[type="text"]');
	const inputSenha = document.querySelector('input[type="password"]');
	const submitBtn = document.querySelector('.btn-login');

	if(submitBtn){
		submitBtn.addEventListener('click', (event) => {
			event.preventDefault();

			fetch('https://reqres.in/api/login', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json'
				},
				body: JSON.stringify({
					email: inputLogin.value,
					password: inputSenha.value,
				})
			}).then((response) => {
				return response.json();
			}).then((data) => {
				console.log(data)
			})
		})
	}

	// console.log(inputLogin);
	// console.log(inputSenha);
	// console.log(submitBtn);
}

window.onload = init;