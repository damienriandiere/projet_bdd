<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Gogitfy | Homepage</title>
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        .btn-rounded {
            border-radius: 20px;
        }

        nav {
            background-color: #2E2E2E;
        }

        .page-footer {
            background-color: #2E2E2E;
        }

        nav ul li a {
            text-decoration: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        #back-to-top {
            position: fixed;
            right: 20px;
            bottom: 20px;
            display: none;
        }
    </style>
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="?page=/" class="brand-logo center">Gogitfy</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li>
                    <a class="dropdown-trigger" href="#" data-target="dropdown1"><i class="material-icons right">menu</i></a>
                    <!-- Dropdown Structure -->
                    <ul id="dropdown1" class="dropdown-content center">
                        <li><a href="?page=/">Home</a></li>
                        <li><a href="?page=addClient">Add a client</a></li>
                        <li><a href="?page=listCommande">List order</a></li>
                        <li><a href="?page=listArticle">List article</a></li>
                        <li><a href="?page=addConcierge">Ajouter un concierge</a></li>

                    </ul>
                </li>
            </ul>
            <a href="?page=connexion" class="right"><i class="material-icons">login</i></a>
    </nav>

    <!-- Initialisation du dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdowns = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(dropdowns);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var backToTopBtn = document.querySelector('#back-to-top');

            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 100) {
                    backToTopBtn.style.display = 'block';
                } else {
                    backToTopBtn.style.display = 'none';
                }
            });

            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>



    <div class="container">

        <div class="input-group mb-3">
            <input type="text" class="form-control" id="searchInput" onkeyup="search()" placeholder="Rechercher par nom">

        </div>

        <table id="ListProduct" class="table table-striped table-hover">
            <tbody>
                <tr>
                    <th>Nom du produit</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Total en stock</th>
                    <th>Statut</th>
                </tr>
                <?php
                require_once('./model/Produit.php');
                require_once('./model/ProduitDAO.php');

                $tab = ProduitDAO::getInstance()->findAll();

                //faire un foreach sur le tableau de commande
                foreach ($tab as $article) {
                    echo "<tr>";
                    echo "<td>" . $article->getNom() . "</td>";
                    echo "<td>" . $article->getDescription() . "</td>";
                    echo "<td>" . $article->getPrix() . "</td>";
                    echo "<td>" . $article->getStock() . "</td>";
                    echo "<td>" . $article->getStatus() . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <script type="text/javascript">
            function search() {
                let input = document.getElementById("searchInput");
                let filter = input.value.toUpperCase();
                let table = document.getElementById("ListProduct");
                let rows = table.getElementsByTagName("tr");

                // Parcourir toutes les lignes du tableau et masquer celles qui ne correspondent pas à la recherche
                for (let i = 1; i < rows.length; i++) {
                    let nameColumn = rows[i].getElementsByTagName("td")[0];
                    console.log(rows);
                    let name = nameColumn.textContent || nameColumn.innerText;

                    if (name.toUpperCase().indexOf(filter) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        </script>

    </div>