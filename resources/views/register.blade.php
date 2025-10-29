<!DOCTYPE html>
<html>

<head>
    <title>Formulaire d'inscription</title>
</head>

<body>
    <h1>Inscription</h1>
<form method="POST" action="{{ route('register.submit') }}">
    @csrf

    <label>Nom:</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Mot de passe:</label>
    <input type="password" name="password">
    @error('password')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br><br>

    <label>Confirmer le mot de passe:</label>
    <input type="password" name="password_confirmation">
    @error('password_confirmation')
        <div style="color:red;">{{ $message }}</div>
    @enderror
    <br><br>

    <button type="submit">S'inscrire</button>
</form>

</body>

</html>