<?php
if (php_sapi_name() == "cli") {

    $host = "localhost"; // Le host est le nom du service, présent dans le docker-compose.yml
    $dbname = "test";
    $charset = "utf8";
    $port = "3308";

    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port","root", "root",
        );

        $file = fopen("data.csv", 'r');
        while (!feof($file) ) {
            $line[] = fgetcsv($file, 300);
        }
        fclose($file);
        if(! empty( $line )) {
            foreach($line as $key => $ligne) {
                $result[$key]["nom"] = explode(";", $ligne[0])[0];
                $result[$key]["ca"] = explode(";", $ligne[0])[1];
            }
            usort($result, "triDescendant");
            // delete all data
            $sql = $pdo->prepare("delete from user")->execute();
            // insert into databse
            $i = 1;
            $sql = "";
            foreach($result as $v ) {
                $v['classement'] = $i;
                $sql .= "('".implode("', '", $v)."'), ";
                $i++;
            }
            $sql = substr($sql, 0, -2);
            $query = "INSERT INTO user (nom, ca, classement) VALUES ".$sql;
            $data= $pdo->prepare($query);
            if($data->execute()) {
                echo "données insérées";
            } else {
                echo "erreur d'insertion";
            }

        }
        }catch (PDOException $e) {
        echo $e;
            }

}

function triDescendant($a, $b){
    $a1 = $a['ca'];
    $a2 = $b['ca'];
    return ($a2-$a1);
}