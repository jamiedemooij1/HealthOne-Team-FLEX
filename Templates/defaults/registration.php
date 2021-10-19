<?php 
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                        if (isset($_POST["registreren"])) {
                            
                            $gebruikersnaam = $_POST["gebruikersnaam"];
                            $wachtwoord = $_POST["wachtwoord"];
                            $EncryptPassword = md5($wachtwoord); 
                            $voornaam = $_POST["voornaam"];
                            $achternaam = $_POST["achternaam"];
                            $telefoonnummer = $_POST["telefoonnummer"];
                            $geslacht = $_POST["geslacht"];
                            $emailadres = $_POST["emailadres"];                            
                            
                            $query= $db->prepare("INSERT INTO customer(gebruikersnaam, wachtwoord, voornaam, achternaam, telefoonnummer, geslacht, emailadres) 
                                                VALUES (:gebruikersnaam, :wachtwoord, :voornaam, :achternaam, :telefoonnummer, :geslacht, :emailadres)");    
                            $query->bindParam("gebruikersnaam", $gebruikersnaam);
                            $query->bindValue("wachtwoord", $wachtwoord);
                            $query->bindParam("voornaam", $voornaam);
                            $query->bindParam("achternaam", $achternaam);
                            $query->bindParam("telefoonnummer", $telefoonnummer);
                            $query->bindParam("geslacht", $geslacht);
                            $query->bindParam("emailadres", $emailadres);
                            if ($query->execute()) {
                                echo "
                                <p class='registration'>Gefeliciteerd! Uw inschrijving is gelukt!</p>";
                            } else {
                                echo "De inschrijving is nog niet gelukt, controleer alleen velden.";
                            }
                        } 
                        
                    }
                    catch (PDOException $e) {
                        die("Error!: " . $e->getMessage());
                    }
                    ?>