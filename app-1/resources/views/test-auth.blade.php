<!DOCTYPE html>
<html>
<head>
    <title>Test Auth - App 1</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 800px; margin: 0 auto; }
        .buttons { margin: 20px 0; }
        .btn { 
            padding: 10px 20px; 
            margin-right: 10px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        .btn-login { background: #4CAF50; color: white; }
        .btn-logout { background: #f44336; color: white; }
        .user-info { 
            background: #f5f5f5; 
            padding: 20px; 
            border-radius: 4px; 
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Test Auth - App 1</h1>
        
        <div class="buttons">
            @if(!Auth::check())
                <form method="POST" action="/test-auth/login" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-login">Authenticate</button>
                </form>
            @else
                <form method="POST" action="/test-auth/logout" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            @endif
        </div>

        <div class="user-info">
            <h2>User Information:</h2>
            <pre>{{ var_dump(Auth::user()) }}</pre>
        </div>
    </div>
</body>
</html> 