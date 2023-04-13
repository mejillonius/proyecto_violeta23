<nav class="container bg-light">
    <div class="container-fluid py-4">
        <div class="justified ">
            <a href="<?= url_base ?>">
                <h3>CRUD de Películas</h3>
            </a>
        </div>
    </div>

    <div class="container">

        <ul class="nav nav-justified py-2 nav-pills">
            <li><button id="btnUno">longi</button></li>

        </ul>

    </div>

</nav>

<script>

    let contenido = document.querySelector('#content');
    let contenidoUno = document.querySelector('#contentUno');

    const inicializar = () => {
        document.querySelector('#btnUno').addEventListener('click', login);

    }

    document.addEventListener("DOMContentLoaded", inicializar);

    const login = () => {
        Swal.fire({
            title: 'Login Form',
            html: `<input type="text" id="login" class="swal2-input" placeholder="Username">
  <input type="password" id="password" class="swal2-input" placeholder="Password">`,
            confirmButtonText: 'Sign in',
            focusConfirm: false,
            preConfirm: () => {
                const login = Swal.getPopup().querySelector('#login').value
                const password = Swal.getPopup().querySelector('#password').value
                if (!login || !password) {
                    Swal.showValidationMessage(`Please enter login and password`)
                }
                return { login: login, password: password }
            }
        }).then((result) => {
            Swal.fire(`
    Login: ${result.value.login}
    Password: ${result.value.password}
  `.trim())
        })
    }
</script>