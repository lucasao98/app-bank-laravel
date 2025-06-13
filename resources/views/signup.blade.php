<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <title>Sign Up</title>
</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" action="/signup/store" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                    @csrf
					<span class="login100-form-title">
						Torne-se um cliente no Byte Bank
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Por favor insira nome completo">
						<input class="input100" type="text" name="fullname" placeholder="Nome Completo" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Por favor insira um email válido">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="send100-form-btn">
							Enviar
						</button>
					</div>


				</form>
			</div>
		</div>
	</div>
</body>
</html>
