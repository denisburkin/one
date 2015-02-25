<style>
	::-moz-focus-inner {
		padding: 0;
		border: 0;
	}

	:-moz-placeholder {
		color: #bcc0c8 !important;
	}

	::-webkit-input-placeholder {
		color: #bcc0c8;
	}

	:-ms-input-placeholder {
		color: #bcc0c8 !important;
	}

	body {

		color: #404040;
		background: #000;
		background-image: url(http://turbion.net/pages/img/4.jpg);background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		position: relative;
	}
	html{
		height: 100%;
	}


	input, textarea, select, label {
		font-family: inherit;
		font-size: 14px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}


	.login {
		padding: 18px 20px;
		width: 200px;
		background: #3f65b7;
		background-clip: padding-box;
		border: 1px solid #172b4e;
		border-bottom-color: #142647;
		border-radius: 5px;
		background-image: -webkit-radial-gradient(cover, #437dd6, #3960a6);
		background-image: -moz-radial-gradient(cover, #437dd6, #3960a6);
		background-image: -o-radial-gradient(cover, #437dd6, #3960a6);
		background-image: radial-gradient(cover, #437dd6, #3960a6);
		-webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 1px 1px rgba(255, 255, 255, 0.1), 0 2px 10px rgba(0, 0, 0, 0.5);
		box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 1px 1px rgba(255, 255, 255, 0.1), 0 2px 10px rgba(0, 0, 0, 0.5);
	}
	.login > h1 {
		margin-bottom: 20px;
		font-size: 16px;
		font-weight: bold;
		color: white;
		text-align: center;
		text-shadow: 0 -1px rgba(0, 0, 0, 0.4);
	}

	.login-input, input:-webkit-autofill:focus, input:-webkit-autofill  {
		display: block;
		width: 100%;
		height: 37px;
		margin-bottom: 20px;
		padding: 0 9px;
		color: white;
		text-shadow: 0 1px black;
		background: #2b3e5d;
		border: 1px solid #15243b;
		border-top-color: #0d1827;
		border-radius: 4px;
		background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.2) 20%, rgba(0, 0, 0, 0));
		background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.2) 20%, rgba(0, 0, 0, 0));
		background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.2) 20%, rgba(0, 0, 0, 0));
		background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.2) 20%, rgba(0, 0, 0, 0));
		-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.2);
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.2);
	}
	input:-webkit-autofill:focus,
	input:-webkit-autofill {
		color: white !important;
		-webkit-box-shadow: 0 0 0px 1000px #E5EFFF  inset , 0 1px rgba(255, 255, 255, 0.2)!important;
	}
	.login-input:focus {
		outline: 0;
		background-color: #32486d;
		-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 4px 1px rgba(255, 255, 255, 0.6);
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 4px 1px rgba(255, 255, 255, 0.6);
	}
	.lt-ie9 .login-input {
		line-height: 35px;
	}

	.login-submit {
		display: block;
		width: 100%;
		height: 37px;
		margin-bottom: 15px;
		font-size: 14px;
		font-weight: bold;
		color: #294779;
		text-align: center;
		text-shadow: 0 1px rgba(255, 255, 255, 0.3);
		background: #adcbfa;
		background-clip: padding-box;
		border: 1px solid #284473;
		border-bottom-color: #223b66;
		border-radius: 4px;
		cursor: pointer;
		background-image: -webkit-linear-gradient(top, #d0e1fe, #96b8ed);
		background-image: -moz-linear-gradient(top, #d0e1fe, #96b8ed);
		background-image: -o-linear-gradient(top, #d0e1fe, #96b8ed);
		background-image: linear-gradient(to bottom, #d0e1fe, #96b8ed);
		-webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), inset 0 0 7px rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.15);
		box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), inset 0 0 7px rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.15);
	}
	.login-submit:active {
		background: #a4c2f3;
		-webkit-box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.4), 0 1px rgba(255, 255, 255, 0.1);
		box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.4), 0 1px rgba(255, 255, 255, 0.1);
	}

	.login-help {
		text-align: center;
	}
	.login-help > a {
		font-size: 14px;
		color: #d4deef;
		text-decoration: none;
		text-shadow: 0 -1px rgba(0, 0, 0, 0.4);
	}
	.login-help > a:hover {
		text-decoration: underline;
	}
.error {
	padding: 10px 0;
	color: rgba(228, 243, 251, 0.75);
}
</style>

<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<div style="position: absolute;top: 50%;left: 50%;margin-top: -130px;margin-left: -100px;">
	<form method="post" class="login">
		<h1>Turbion</h1>
		<? if (!empty($errors)) echo '<div class="error">'.$errors.'</div>';?>
		<input type="login" name="login" class="login-input" placeholder="Логин" autofocus>
		<input type="password" name="password" class="login-input" placeholder="Пароль">
		<input type="submit" value="Вход" class="login-submit">
		<p class="login-help"><a href="index.html">Вернутся назад ?</a></p>
	</form>
</div>
