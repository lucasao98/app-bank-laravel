<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" action="/login" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                    @csrf
					<span class="login100-form-title">
						Byte Bank
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Entrar
						</button>
					</div>
                </form>
                <div class="flex-col-c p-t-30 p-b-40">
                    <span class="txt1 p-b-9">
                        Não tem uma conta?
                    </span>

                    <a href="/signup" class="txt2">
                        Cadastre-se já
                    </a>
                </div>
			</div>
		</div>
	</div>
</body>
</html>
