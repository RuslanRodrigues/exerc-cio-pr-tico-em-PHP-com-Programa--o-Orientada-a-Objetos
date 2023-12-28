
<body>
    <table border="1">
        <tr>
            <th>Resultado $p1</th>
            <th>Resultado $p2</th>
        </tr>
        <tr>
            <td><pre>
                <?php
                require_once 'classes.php';

                $p1 = new ContaBanco();
                echo "<br>";
                $p1->abrirConta("CC");
                $p1->setNumConta(2222);
                $p1->setDono("José do Egito");
                echo "<br>";
                $p1->depositar(500);
                echo "<br>";
                $p1->sacar(100);
                echo "<br>";
                $p1->pagarMensal();
                echo "<br>";
                print_r($p1);
                ?>
            </td></pre>
            <td><pre>
                <?php
                $p2 = new ContaBanco();
                echo "<br>";
                $p2->abrirConta("CP");
                $p2->setNumConta(11111);
                $p2->setDono("Maria do Egito");
                echo "<br>";
                $p2->depositar(480);
                echo "<br>";
                $p2->sacar(80);
                echo "<br>";
                print_r($p2);
                ?>
            </td></pre>
        </tr>
    </table>
</body>
