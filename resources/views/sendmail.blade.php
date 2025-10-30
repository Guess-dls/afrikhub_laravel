
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test Envoi Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Envoyer un mail de test</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('mail.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email">Email destinataire</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message">Message</label>
            <input type="text" name="message" id="message" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
</body>
</html>

