
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login:Gestion Fiduciaire</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/semantic.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/mystyles/styles.css') }}">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="{{ asset('assets/semantic.min.js') }}"></script>
</head>

<body>
<style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal header">
      <div class="content">
        Gestion Fiduciaire
      </div>
    </h2>
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="E-mail address">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large teal submit button">Se connecter</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      Mot de passe oublié ? <a href="#"> Par ici</a>
    </div>
  </div>
</div>
 <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Please enter a valid e-mail'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Please enter your password'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Your password must be at least 6 characters'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</body>

</html>