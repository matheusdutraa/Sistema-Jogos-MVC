<!DOCTYPE html>
<html lang="en">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    h4 {
    color: #fff;
    font-size: 2.5em;
    margin-bottom: 10px;
  }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  
  body {
      font-family: 'Roboto', sans-serif;
      background-color: #1C1C1C;
      
      align-items: center;
      justify-content: center;
      height: 100vh;
  }
    
  .container {
      text-align: center;
      padding: 50px;
  }
    
    a {
        text-decoration: none;
        font-size: 24px;
        color: #fff;
        margin-top: 20px;
        margin-bottom: 50px;
        margin-left: 20px;
        display: inline-block;
        font-size: 1.2em;
        padding: 10px 20px;
        background-color: rgba(255, 255, 255, 0.1);
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }
    
    a:hover {
        transform: translateY(-5px);
        background-color: #e8341d;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    }
    
    form {
        background-color: #1C1C1C;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        color: #fff;
        max-width: 25%; 
        margin-left:auto;
        margin-right:auto;
    }
    
    label {
        font-size: 16px;
        display: block;
        margin-bottom: 10px;
    }
    
    input {
        width: 75%;
        padding: 10px;
        margin-bottom: 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    
    button {
        width: 30%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #e8341d;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        margin-top: 20px;
    }
    
    button:hover {
        background-color: rgba(232, 52, 29, 0.8);
    }
</style>
<body>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-6">
                <div class="alert alert-info">
                    <h4>Informe os dados para logar:</h4>
                    <br>
                    <!-- Formulário de login -->
                    <form id="frmLogin" name="formLogin" >
                        <div class="form-group">
                            <label for="txtLogin">Login:</label>
                            <input type="text" class="form-control" name="login" id="txtLogin"
                                maxlength="15" />        
                        </div>

                        <div class="form-group">
                            <label for="txtSenha">Senha:</label>
                            <input type="password" class="form-control" name="senha" id="txtSenha"
                                maxlength="15" />        
                        </div>

                        <button type="button" class="btn btn-success" 
                            onclick="logar();">Logar</button>
                    </form>
                </div>
            </div>

            <div class="col-6">
                <div id="divMsgErro" class="alert alert-danger" 
                    style="display: none;">
                    Teste
                </div>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>