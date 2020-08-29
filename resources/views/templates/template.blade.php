<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <title>CRUDmaster</title>
</head>
<body>
    <div id="title">
        <a href="">
            C R U D
            <br>
            master
        </a>
    </div>

    <h2 id="sub-title">
        @yield('subTitle')
    </h2>

    <div>
        @yield('content')
    </div>

</body>
<script defer src="https://friconix.com/cdn/friconix.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
    function buttonAddDescription() {
        document.getElementById('list-add-btn').innerHTML = "Adicionar usuário";
    }

    function buttonRmvDescription() {
        document.getElementById('list-add-btn').innerHTML = "+";
    }

    function cityUpdate() {
        var select = document.getElementById('estadoSelect');
        var option = select.options[select.selectedIndex];

        var link = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+option.value+"/municipios";

        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'json',
        })
        .done(formSelectSetup);
    }

    function formSelectSetup(value) {
        $.each(
            value, function (index, value) {
                document.getElementById('cidadeSelect').innerHTML += "<option value="+value.nome+">"+value.nome+"</option>";
            }
        );
    }
</script>
</html>