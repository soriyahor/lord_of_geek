<table style="border-collapse: collapse; border:1px solid black">
    <tr style="border:1px solid black">
        <th>Commande n°</th>
        <th>Date</th>
        <th>Code client</th>
        <th>Quantite</th>
        <th>prix</th>
        <th>Etat</th>
        <th>Nom jeu</th>
        <th>Description</th>
        <th>Version</th>
        <th>Console</th>
        <th>Catégorie</th>
    </tr>


    <?php
    // var_dump($commandes);

    foreach ($commandes as $key => $value) {
        echo "<tr>";
        foreach ($value as $keys => $values) {
            echo "<td style='border:1px solid black'>" . $values . "</td>";
        }
        echo "<tr>" . "</br>";
    }

    ?>

</table>