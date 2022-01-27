<?php

            $servname = 'localhost';
            $dbname = 'gites';
            $user = 'root';
            $pass = '';
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "CREATE TABLE Locations(
                        Id_quest INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        Logement VARCHAR (30) NOT NULL,
                        Lits VARCHAR(30) NOT NULL,
                        Wifi VARCHAR(30) NOT NULL,
                        Parking VARCHAR(30) NOT NULL,
                        Description VARCHAR(70) NOT NULL,
                        Contact VARCHAR(70) NOT NULL)";
                $dbco->exec($sql);
                echo 'Table bien créée !';
            }
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }

        ?>