<?php 
                    try {
                        $db = new PDO("mysql:host=localhost;dbname=healthone", "root", "");
                        if (isset($_POST["registreren"])) {
                            
                            $gebruikersnaam = $_POST["username"];
                            $wachtwoord = $_POST["password"];
                            $EncryptPassword = md5($wachtwoord); 
                            $voornaam = $_POST["first-name"];
                            $achternaam = $_POST["last-name"];
                            $telefoonnummer = $_POST["phonenumber"];
                            $geslacht = $_POST["gender"];
                            $emailadres = $_POST["mailaddress"];   
                            $abonnement = $_POST["subscription"];                           
                            
                            $query= $db->prepare("INSERT INTO customer(username, password, first-name, last-name, phonenumber, gender, mailaddress, subscription) 
                                                VALUES (:username, :password, :first-name, :last-name, :phonenumber, :gender, :mailaddress, :subscription)");    
                            $query->bindParam("username", $gebruikersnaam);
                            $query->bindValue("password", $wachtwoord);
                            $query->bindParam("first-name", $voornaam);
                            $query->bindParam("last-name", $achternaam);
                            $query->bindParam("phonenumber", $telefoonnummer);
                            $query->bindParam("gender", $geslacht);
                            $query->bindParam("mailaddress", $emailadres);
                            $query->bindParam("subscription", $abonnement);
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