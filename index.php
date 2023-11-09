<!DOCTYPE html>
<html>
<head>
    <title>Página de Dados</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <table border=1>
        <thead>
            <tr><th>Moeda</th><th>Valor</th></tr>
        </thead>
        <tbody id="tabela-dados">
        BANCOS
PF
ESTRANGEIROS
OUTROS

        <tr><td>BANCOS</td><td id="BANCOS"></td></tr>
        <tr><td>PF</td><td id="PF"></td></tr>
        <tr><td>ESTRANGEIROS</td><td id="ESTRANGEIROS"></td></tr>
        <tr><td>OUTROS</td><td id="OUTROS"></td></tr>
        <tr><td>NOVA FUTURA</td><td id="NOVA_FUTURA"></td></tr>
        <tr><td>GENIAL</td><td id="GENIAL"></td></tr>
        <tr><td>BTG</td><td id="BTG"></td></tr>
        <tr><td>GUIDE</td><td id="GUIDE"></td></tr>
        <tr><td>TERRA</td><td id="TERRA"></td></tr>
        <tr><td>C6 BANK</td><td id="C6_BANK"></td></tr>
        <tr><td>LEV</td><td id="LEV"></td></tr>
        <tr><td>ORAMA</td><td id="ORAMA"></td></tr>
        <tr><td>CLEAR</td><td id="CLEAR"></td></tr>
        <tr><td>AGORA</td><td id="AGORA"></td></tr>
        <tr><td>SAFRA</td><td id="SAFRA"></td></tr>
        <tr><td>EASYNVEST</td> <td id="EASYNVEST"></td></tr>
        </tbody>
    </table>

    <script>
         function buscarDados() {
            $.ajax({
                type: "GET",
                url: "dados.php", // Arquivo PHP para buscar dados no banco
                dataType: "json", // Especifica que os dados são JSON
                success: function (data) {
                    

                    $.each(data, function (index, objeto) {
                    // Verifique se o ID correspondente existe na tabela
                    var id = objeto.moeda;
                    var valor = objeto.valor;

                    var elementoTD = $("#" + id); // Selecione o elemento pelo ID
                    if (elementoTD.length > 0) {
                        // Se o elemento com o ID existe, defina o valor
                        elementoTD.text(valor);
                    }
                });
                }
            });
        }

        buscarDados();
        setInterval(buscarDados, 2000);
    </script>
</body>
</html>