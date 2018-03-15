<div class="reg-form">
	<form action="#" method="post">
		<div class="form-group">
			<label for=""><h3>Фамилия*</h3></label>
			<input type="text" class="inputbox" placeholder="Введите фамилию" name="lastName" required >
		</div>
		<div class="form-group">
			<label for=""><h3>Имя*</h3></label>
			<input type="text" class="inputbox" placeholder="Введите имя" name="firstName" required >
		</div>
		<div class="form-group">
			<label for=""><h3>Отчество</h3></label>
			<input type="text" class="inputbox" placeholder="Введите отчество" name="middleName">
		</div>
		<div class="form-group">
			<label for=""><h3>Номер телефона*</h3></label>
			<input type="tel" class="inputbox" placeholder="+7(000)123-34-56" name="phone" pattern="[\+]\d{1}[\(]\d{3}[\)]\d{3}[\-]\d{2}[\-]\d{2}" minlength="16" maxlength="16" required >
		</div>
		<div class="form-group">
			<label for=""><h3>Сообщение*</h3></label>
			<textarea type="text" id="message" placeholder="Введите текст сообщения" name="message" cols="60" rows="10" required></textarea>
		</div>
		<div class="form-group">
			<p><input type="checkbox" name="personalData" required >Я даю согласие на обработку персональных данных</p>
		</div>
		<div class="btn-block">
			<button class="send-button" name="sendButton" type="submit">Отправить</button>
		</div>
	</form>
</div>